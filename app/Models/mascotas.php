<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mascotas extends Model
{
    use HasFactory;
    protected $primaryKey ='idma';
    protected $fillable = ['idma','nombre','edad', 'cp', 'costo', 'fecha', 'sexo', 'ide', 'idco', 'observaciones', 'activo', 'foto', 'cartilla'];
}
