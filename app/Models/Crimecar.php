<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crimecar extends Model
{
    use HasFactory;
    protected $table = 'crimecars';
    public $timestamps = false;
    protected $fillable = [
        'car_plate',
    ];

    public function crimehistory()
    {
        return $this->hasMany(Crimehistory::class,'crime_car');
    }

}
