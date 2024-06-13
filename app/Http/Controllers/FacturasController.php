<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Cliente;
use App\Models\Formapago;
use App\Models\Estadofactura;
use App\Models\Factura; 

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $facturas = Factura::all();

      
        return view('facturas.index', compact('facturas'));
    }

    public function create()
{
    // Definir un valor predeterminado para $detalles
    $detalles = ''; // O cualquier valor predeterminado que desees

    // Obtener los clientes, formas de pago y estados de factura
    $clientes = Cliente::orderBy('nombre', 'asc')->pluck('nombre', 'id');
    $formas = Formapago::orderBy('nombre', 'asc')->pluck('nombre', 'id');
    $estados = Estadofactura::orderBy('nombre', 'asc')->pluck('nombre', 'id');

    // Pasar los datos a la vista
    return view ('facturas.create', compact('clientes', 'formas', 'estados', 'detalles'));
}


    public function store(Request $request)
    {
        $this->validate($request, [
            'numero' => 'required|numeric',
            'valor' => 'required|numeric',
            'detalles' => 'required',
            'idcliente' => 'required',
            'idestado' => 'required',
            'idforma' => 'required',
            'archivo' => 'mimes:jpeg,png'
        ]);
        $now = new \Datetime();
        $fecha = $now->format('Ymd-His');
        $numero = $request->get('numero');
        $archivo = $request->file('archivo');
        $nombre = "";

        if($archivo){
            $extension = $archivo->getClientOriginalExtension();
            $nombre = "factura-".$numero."-".$fecha.".".$extension;
            \Storage::disk('local')->put($nombre, \File::get($archivo));
        }

        //insertar la informacion a la tabla
        $factura = Factura::create([
            'numero'=>$request->get('numero'),
            'detalles'=>$request->get('detalles'),
            'valor'=>$request->get('valor'),
            'archivo'=>$nombre,
            'idcliente'=>$request->get('idcliente'),
            'idestado'=>$request->get('idestado'),
            'idforma'=>$request->get('idforma'),
        ]);

        return redirect()->route('facturas.index')->with('mensaje', 'Factura creada exitosamente');

    }
    public function edit($id)
    {
        $detalles1 = '';

        $factura = Factura::find($id);
        $clientes = Cliente::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        $formas = Formapago::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        $estados = Estadofactura::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        
        return view ('facturas.editar',compact('factura', 'clientes', 'formas','estados'));

    }

    public function update(Request $request, $id)

    {
        $detalles1 = '';
        
        $this->validate($request, [
            'numero' => 'required|numeric',
            'valor' => 'required|numeric',
            'detalles' => 'required',
            'idcliente' => 'required',
            'idestado' => 'required',
            'idforma' => 'required',
            'archivo' => 'mimes:jpeg,png'
        ]);

        $now = new \Datetime();
        $fecha = $now->format('Ymd-His');
        $numero = $request->get('numero');
        $archivo = $request->file('archivo');
        $nombre = "";

        if($archivo){
            $extension = $archivo->getClientOriginalExtension();
            $nombre = "factura-".$numero."-".$fecha.".".$extension;
            \Storage::disk('local')->put($nombre, \File::get($archivo));
        }

        $factura = Factura::find($id);
        $factura->detalles = $request->get('numero');
        $factura->detalles = $request->get('detalles');
        $factura->valor = $request->get('valor');
        if($archivo){
            $factura->archivo = $nombre;
        }
        $factura->idcliente = $request->get('idcliente');
        $factura->idestado = $request->get('idestado');
        $factura->idforma = $request->get('idforma');
        $factura->save();

        return redirect()->route('facturas.index');

    }
    
    public function destroy(string $id)
    {
        $factura = Factura::find($id);
        $factura->delete();

        return redirect()->route('facturas.index');
    }
}

