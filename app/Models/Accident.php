<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    use HasFactory;

    protected $table = 'accidents';

    protected $fillable = [
        'image',
        'radar_id',
        'is_reviewed',
    ];

    public function radar()
    {
        return $this->belongsTo(Radar::class);
    }


}