<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 
        'designation', 
        'mobile_number', 
        'is_active'
    ];
}