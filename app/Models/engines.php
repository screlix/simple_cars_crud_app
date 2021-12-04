<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class engines extends Model
{
    use HasFactory;
    protected $primarykey = "id";
    protected $table = 'engines';
    public $timestamps = false;
    protected $guarded = [];
    // public function engines(){
    //     return $this->belongsTo(carModels::class)
    // } 
}
