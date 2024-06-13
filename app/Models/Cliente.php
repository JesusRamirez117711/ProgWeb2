<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes'; 

    protected $fillable = ['nombre', 'rfc', 'direccion', 'telefono', 'email'];

    public $timestamps = false; 
}
