<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvironmentalLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'node_id', 
        'temperature', 
        'smoke_level', 
        'water_level', 
        'status', 
        'hazard_type', 
        'alert_dispatched'
    ];

    // This log belongs to a specific Node
    public function node()
    {
        return $this->belongsTo(Node::class);
    }
}