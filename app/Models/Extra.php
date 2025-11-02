<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extra extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'description', 'unit_price', 'inventory_id'];
    public function inventoryItem()
{
    return $this->belongsTo(InventoryItem::class, 'inventory_id');
}

public function bookings(){
    return $this->belongsToMany(Booking::class, 'booking_extras')->withPivot('quantity','price');
}
}
