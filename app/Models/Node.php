<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    protected $fillable = [
        'hardware_id', 
        'location_name', 
        'specific_area', 
        'ip_address', 
        'status', 
        'last_ping_at'
    ];

    // A Node has many Environmental Logs
    public function logs()
    {
        return $this->hasMany(EnvironmentalLog::class);
    }
}