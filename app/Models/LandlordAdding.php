<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandlordAdding extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'adding',
    ];
}
