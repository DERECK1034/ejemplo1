<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discos extends Model
{
    use HasFactory;
    protected $primaryKey ='idd';
    protected $fillable = ['nombre' ,'fecha', 'genero', 'clave1', 'clave2', 'ida'];
}
