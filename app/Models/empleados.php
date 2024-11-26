<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    use HasFactory;
    protected $primaryKey ='idemp';
    protected $fillable = ['idemp' ,'nombre', 'edad', 'foto', 'cv'];
}
