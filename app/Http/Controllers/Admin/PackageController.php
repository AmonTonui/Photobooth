<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items=Package::latest()->paginate(15); 
        return view('admin.packages.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        //
        $data=$r->validate(['name'=>'required','description'=>'nullable','base_price'=>'required|numeric|min:0','duration_hours'=>'required|integer|min:1']);
        Package::create($data);
        return redirect()->route('admin.packages.index')->with('ok','Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        //
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Package $package)
    {
        //
        $data = $r->validate([
        'name' => 'required|string|max:120',
        'description' => 'nullable|string',
        'base_price' => 'required|numeric|min:0',
        'duration_hours' => 'required|integer|min:1|max:24',
        ]);
        $package->update($data);
        return redirect()->route('admin.packages.index')->with('ok','Package updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        //
        $package->delete();
        return back()->with('ok','Package deleted');
    }
}
