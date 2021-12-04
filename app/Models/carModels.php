<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carModels extends Model
{
    use HasFactory;

    protected $primarykey = "id";
    protected $table = 'carModels';
    public $timestamps = false;
    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo(car::class);
    }
}
