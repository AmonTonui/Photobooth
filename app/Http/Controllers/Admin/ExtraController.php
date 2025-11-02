<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use Illuminate\Http\Request;
use App\Models\InventoryItem;
use Illuminate\Support\Facades\Schema;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items = Extra::with(['inventoryItem'])->latest()->paginate(15);
        return view('admin.extras.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $inventories = [];
        if (class_exists(InventoryItem::class) && Schema::hasTable('inventory_items')) {
             $inventories = InventoryItem::orderBy('name')->get(['id','name']);
        }
        return view('admin.extras.create', compact('inventories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        //
        $data = $r->validate([
        'name' => 'required|string|max:120|unique:extras,name',
        'description' => 'nullable|string',
        'unit_price' => 'required|numeric|min:0',
        // 'inventory_id' => 'nullable|exists:inventory_items,id',
        ]);
        // Extra::create($data);
        // return redirect()->route('admin.extras.index')->with('ok','Extra created Successfully');

        if (class_exists(InventoryItem::class) && Schema::hasTable('inventory_items')) {
            $rules['inventory_id'] = 'nullable|exists:inventory_items,id';
        } else {
            $rules['inventory_id'] = 'nullable';
        }

        $data = $r->validate($rules);

        Extra::create($data);

        return redirect()->route('admin.extras.index')->with('ok', 'Extra created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Extra $extra)
    {
        //
        return redirect()->route('admin.extras.edit', $extra);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extra $extra)
    {
        //
        $inventories = [];
        if (class_exists(InventoryItem::class) && Schema::hasTable('inventory_items')) {
             $inventories = InventoryItem::orderBy('name')->get(['id','name']);
        }
        return view('admin.extras.edit', compact('extra','inventories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Extra $extra)
    {
        //
        $data = $r->validate([
        'name' => 'required|string|max:120|unique:extras,name,'.$extra->id,
        'description' => 'nullable|string',
        'unit_price' => 'required|numeric|min:0',
        // 'inventory_id' => 'nullable|exists:inventory_items,id',
        ]);
        // $extra->update($data);
        // return redirect()->route('admin.extras.index')->with('ok','Extra updated');

        if (class_exists(InventoryItem::class) && Schema::hasTable('inventory_items')) {
        $rules['inventory_id'] = 'nullable|exists:inventory_items,id';
        } else {
            $rules['inventory_id'] = 'nullable';
        }

        $data = $r->validate($rules);

        $extra->update($data);

        return redirect()->route('admin.extras.index')->with('ok', 'Extra updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extra $extra)
    {
        //
        try {
            $extra->delete();
            return back()->with('ok','Extra deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle potential foreign key constraint errors if bookings use this extra
             return back()->withErrors(['error' => 'Cannot delete extra as it is currently assigned to bookings.']);
        }
    }
}
