<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    protected $primaryKey ='idven';
    protected $fillable = ['idven','idcli', 'fecha', 'idu'];
}
