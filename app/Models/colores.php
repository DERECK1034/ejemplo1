<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colores extends Model
{
    use HasFactory;
    protected $primaryKey ='idco';
    protected $fillable = ['idco','nombre, activo'];
}
