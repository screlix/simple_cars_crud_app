<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class founder extends Model
{
    use HasFactory;
    protected $primarykey = "id";
    protected $table = 'founders';
    protected $timestamps = false;
    protected $guarded = [];
}
