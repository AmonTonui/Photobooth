<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'description', 'base_price', 'duration_hours'];

    protected $casts = [
        'base_price' => 'decimal:2',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
