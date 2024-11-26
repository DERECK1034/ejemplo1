<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class juegos extends Model
{
    use HasFactory;
    protected $primaryKey ='idj';
    protected $fillable = ['ide','nombre', 'idc', 'idt','cantidad', 'costo'];
}
