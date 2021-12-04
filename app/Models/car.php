<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $primarykey = "id";
    protected $table = "cars";
    public $timestamps = false;
    protected $guarded = [];

    public function carModels()
    {
        return $this->hasMany(carModels::class);
    }
    public function engines()
    {
        return $this->hasManyThrough(engines::class, carModels::class, 'car_id', 'model_id');
    }
    public function carProduction(){
        return $this->hasOneThrough(carModels::class, carProduction::class,'car_id', 'car_model');
    }
    public function founder(){
        return $this->hasOne(founder::class); 
    }
}
