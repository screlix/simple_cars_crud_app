<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carProduction extends Model
{
    use HasFactory;
    protected $primarykey = "id";
    protected $table = 'car_productions';
    protected $timestamps = false;
    protected $guarded = [];
}
