<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\{Booking, Payment};

class DashboardController extends Controller
{
    //
    public function index(){
        $from = now()->startOfMonth();
        $to   = now()->endOfMonth();

        $bookings = Booking::whereBetween('created_at', [$from, $to])->count();

        // No payments/expenses models yet -> show zeros (and a chart with zeros)
        $revenue  = 0.0;
        $expenses = 0.0;
        $profit   = 0.0;

        // Bookings per day (this month)
        $byDay = Booking::whereBetween('created_at', [$from, $to])
            ->selectRaw('DATE(created_at) d, COUNT(*) c')
            ->groupBy('d')->orderBy('d')->get();

        $bookingsByDayLabels = $byDay->pluck('d')->map(fn($d)=>Carbon::parse($d)->format('M j'))->values();
        $bookingsByDayData   = $byDay->pluck('c')->values();

        // Revenue vs Expenses (last 6 months) -> zeros until models exist
        $start6 = now()->startOfMonth()->subMonths(5);
        $months = collect(range(0,5))->map(fn($i)=>$start6->copy()->addMonths($i));
        $reMonthLabels = $months->map(fn($m)=>$m->format('M Y'))->values();
        $revenueSeries = $months->map(fn()=>0)->values();
        $expenseSeries = $months->map(fn()=>0)->values();

        // Package popularity (all time) — requires bookings.package_id to exist
        $packagesAgg = Booking::query()
            ->join('packages','packages.id','=','bookings.package_id')
            ->selectRaw('packages.name label, COUNT(*) c')
            ->groupBy('label')->orderByDesc('c')->limit(6)->get();

        $pkgLabels = $packagesAgg->pluck('label')->values();
        $pkgData   = $packagesAgg->pluck('c')->values();

        return view('admin.dashboard', compact(
            'bookings','revenue','expenses','profit',
            'bookingsByDayLabels','bookingsByDayData',
            'reMonthLabels','revenueSeries','expenseSeries',
            'pkgLabels','pkgData'
        ));
    }
    
}
