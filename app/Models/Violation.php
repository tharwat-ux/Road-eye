<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'car_plate',
        'image',
        'radar_id',
        'fees',
        'is_reviewed',
    ];


    
    public function radar()
    {
        return $this->belongsTo(Radar::class);
    }
}
