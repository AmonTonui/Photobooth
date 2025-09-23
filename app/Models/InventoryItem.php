<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    //
    use HasFactory;
    protected $fillable = ['name','stock_qty','unit_cost','is_consumable'];

    protected $casts = [
        'is_consumable' => 'boolean',
        'unit_cost' => 'decimal:4',
    ];
}
