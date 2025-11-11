<?php

// app/Models/LandlordAdding.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandlordAdding extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'contact',
        'property_name',
        'property_description',
        'property_price',
        'adding_date',
        'image',
        'latitude',
        'longitude',
    ];

    // Optional: relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function bookings()
    {
        return $this->hasMany(TenantBooking::class, 'adding_id');
    }
}
