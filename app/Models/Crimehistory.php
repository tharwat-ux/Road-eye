<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crimehistory extends Model
{
    use HasFactory;
    protected $table = 'crimehistory';
    protected $fillable = ['crime_car', 'radar_id'];


    public function radar()
    {
        return $this->belongsTo(Radar::class);
    }

}
