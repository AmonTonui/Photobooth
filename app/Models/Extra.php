<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    //
    public function inventoryItem()
{
    return $this->belongsTo(InventoryItem::class, 'inventory_id');
}
}
