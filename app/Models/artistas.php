<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artistas extends Model
{
    use HasFactory;
    protected $primaryKey ='ida';
    protected $fillable = ['ida','nombre'];
}
