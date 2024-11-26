<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventasdetalles extends Model
{
    use HasFactory;
    protected $primaryKey ='idvd';
    protected $fillable = ['idvd','idven', 'idprod', 'cantidad', 'costo', 'lote'];
}
