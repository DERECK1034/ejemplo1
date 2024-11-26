<?php

namespace App\Http\Controllers;

use App\Models\artistas;
use App\Models\discos;
use App\Models\consolas;
use App\Models\tipos;
use App\Models\juegos;
use App\Models\marcas;
use App\Models\submarcas;
use App\Models\productos;

use Session;

use Illuminate\Http\Request;

class dianacontroller extends Controller
{
    public function altadisco()
    {
        $todosartistas = artistas::orderby('nombre', 'asc')->get();
        return view('disco')->with('todosartistas', $todosartistas);

    }

    public function guardadisco(request $request)
    {

        $this->validate($request,[   
            'nombre'=>'regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,Ü,ñ,Ñ]+$/',
            'fecha'=>'required|date',
            'clave1'=>'regex:/^[A-Z][a-z]{2}[-][a-z]{1}$/',
            'clave2'=>'regex:/^[a-z]+[A-Z]{2}[a-z]*$/'
        ]);
        
        $insertadisco =\DB::insert("INSERT INTO discos (nombre, fecha, genero, clave1, clave2, ida)
        VALUE('$request->nombre','$request->fecha', '$request->genero', '$request->clave1', '$request->clave2', $request->ida)");
        return "El disco $request->nombre ha sido guardado correctamente";
        
    }

    public function altajuegos()
    {
        $todasconsolas = consolas::orderby('nombre', 'asc')->get();
        $todostipos = tipos::orderby('nombre', 'asc')->get();
        return view('altajuegos')
        ->with('todasconsolas', $todasconsolas)
        ->with('todostipos', $todostipos);
    }

    public function guardajuego(request $request)
    {
        \DB::table('juegos')->insert([
            'nombre' => $request->nombre,
            'idc' => $request->idc,
            'idt' => $request->idt,
            'cantidad' => $request->cantidad,
            'costo' => $request->costo,
        ]);
        return "juego guardado";
    }

    public function reporteprod()
    {
        $consulta = \DB::select("SELECT p.idp, p.clave, m.nombre AS marca, s.nombre AS submarca, p.cadena1, p.cadena2
        FROM productos AS p
        INNER JOIN marcas AS m ON p.idma = m.idma
        INNER JOIN submarcas AS s ON p.idsm = s.idsm");

        return view ('reportediana')->with('consulta', $consulta);
    }

    public function editaproducto($idp)
    {
        $info =\DB::select("SELECT p.idp, p.clave, p.idma, m.nombre AS marca, p.idsm, s.nombre AS submarca, p.cadena1, p.cadena2
        FROM productos AS p
        INNER JOIN marcas AS m ON p.idma = m.idma
        INNER JOIN submarcas AS s ON p.idsm = s.idsm
        WHERE idp = $idp");

        $marcas= marcas::where('idma', '<>', $info[0]->idma)
        -> orderby('nombre', 'Asc')
        ->get();

        $submarcas= submarcas::where('idsm', '<>', $info[0]->idsm)
        -> orderby('nombre', 'Asc')
        ->get();
        
        return view('modificadiana')
        ->with('info', $info[0])
        ->with('marcas', $marcas)
        ->with('submarcas', $submarcas);
    }

    public function guardacambios(request $request)
    {
        $productos = productos::find($request->idp);
        $productos->clave=$request->clave;
        $productos->idma=$request->idma;
        $productos->idsm=$request->idsm;
        $productos->cadena1=$request->cadena2;
        $productos->cadena2=$request->cadena2;
        $productos->save();

        Session::flash('mensaje', "La información del producto $request->nombre se ha editado correctamente");
        return redirect()->route('reporteprod');
    }

}
