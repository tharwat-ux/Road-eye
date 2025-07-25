<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'car_plate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
