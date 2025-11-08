<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantBooking extends Model
{
    use HasFactory;

   protected $fillable = [
    'user_id',
    'name',
    'contact',
    'landlord_id',
    'landlord_name',
    'landlord_contact',
    'property_name', // ✅ add this
     'booking_date',  
     'image',
    'latitude',
    'longitude',
];

}
