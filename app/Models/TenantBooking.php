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
    'adding_id',
];
  public function tenant()
    {
        return $this->belongsTo(User::class, 'user_id'); 
        // Assuming 'user_id' in tenant_bookings points to users table
    }

    // Relationship to property (optional)
    public function property()
    {
        return $this->belongsTo(LandlordAdding::class, 'adding_id');
    }

}
