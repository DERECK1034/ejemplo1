<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;
    protected $primaryKey ='idprod';
    protected $fillable = ['idprod', 'nombre', 'lote', 'fechacad', 'existencia', 'costo', 'idcat', 'activo'];
}
