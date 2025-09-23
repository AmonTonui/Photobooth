<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use Illuminate\Http\Request;
use App\Models\InventoryItem;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $inventories = InventoryItem::orderBy('name')->get(['id','name']);
        return view('admin.extras.create', compact('inventories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        //
        $data = $r->validate([
        'name' => 'required|string|max:120',
        'description' => 'nullable|string',
        'unit_price' => 'required|numeric|min:0',
        'inventory_id' => 'nullable|exists:inventory_items,id',
    ]);
    Extra::create($data);
    return redirect()->route('admin.extras.index')->with('ok','Extra created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Extra $extra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extra $extra)
    {
        //
        $inventories = InventoryItem::orderBy('name')->get(['id','name']);
        return view('admin.extras.edit', compact('extra','inventories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Extra $extra)
    {
        //
        $data = $r->validate([
        'name' => 'required|string|max:120',
        'description' => 'nullable|string',
        'unit_price' => 'required|numeric|min:0',
        'inventory_id' => 'nullable|exists:inventory_items,id',
        ]);
        $extra->update($data);
        return redirect()->route('admin.extras.index')->with('ok','Extra updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extra $extra)
    {
        //
        $extra->delete();
        return back()->with('ok','Extra deleted');
    }
}
