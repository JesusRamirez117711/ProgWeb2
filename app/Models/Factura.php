<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model

{
    protected $table = 'facturas';
    protected $fillable = [
        'numero', 'detalles', 'valor', 'archivo', 'idcliente', 'idforma', 'idestado'
    ];
    

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente');
    }


}
