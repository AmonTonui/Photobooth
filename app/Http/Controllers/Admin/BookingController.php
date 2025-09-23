<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $r)
    {
        //
        $q = Booking::query()->with(['package']);

        if ($r->filled('status')) $q->where('status', $r->string('status'));
        if ($r->filled('from'))   $q->whereDate('event_date','>=',$r->date('from'));
        if ($r->filled('to'))     $q->whereDate('event_date','<=',$r->date('to'));

        $items = $q->latest()->paginate(20)->withQueryString();
        return view('admin.bookings.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
        $booking->load(['package','extras','payments','expenses']);
        $totalExtras = $booking->extras->sum(fn($e) => (float)$e->pivot->price * (int)$e->pivot->quantity);
        $paid = (float)$booking->payments->sum('amount');
        $spent = (float)$booking->expenses->sum('amount');
        return view('admin.bookings.show', compact('booking','totalExtras','paid','spent'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
