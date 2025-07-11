<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Radar extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'location',
        'traffic_id',
        'width',
        'lenght',
        'top_right',
        'top_left',
        'bottom_right',
        'bottom_left',
        'max_speed',
        'congestion_rate',
        'is_violation',
        'is_accident',
        'is_crime_cars',
    ];

    // علاقة radar ب traffic
    public function traffic()
    {
        return $this->belongsTo(Traffic::class);
    }
}
