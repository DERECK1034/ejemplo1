<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\especies;
use App\Models\colores;
use App\Models\mascotas;

use Session;

class mascotascontroller extends Controller
{
    public function altamascotas()
    {
        if(Session::get('sesionidu'))
        {

            $todasespecies = especies::orderby('nombre', 'asc')->get();
            //$todasespecies =\DB::select("select * from especies order by nombre asc");
            $todoscolores = colores::where('activo','=','Si')->get();
            //return $todasespecies;
            return view('mascotas.altamascotas')
            ->with('todasespecies', $todasespecies)
            ->with('todoscolores', $todoscolores);

        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login.login');
        }
    }

    public function guardamascota(Request $request)
    {
        $this->validate($request,[   
            'nombre'=>'regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,Ü,ñ,Ñ]+$/',
            'edad'=>'required|numeric|integer|max:20',
            'cp'=>'regex:/^[0-9]{5}$/',
            'costo'=>'regex:/^[0-9]+[.][0-9]{2}$/',
            'fecha'=>'required|date',
            'foto'=>'mimes:jpg,png,gif, jpeg', 
            'cartilla'=>'mimes:pdf, docx'
        ]);

        //$mascotas = new mascotas;
        //$mascotas->nombre=$request->nombre;
        //$mascotas->edad=$request->edad;
        //$mascotas->cp=$request->cp;
        //$mascotas->costo=$request->costo;
        //$mascotas->fecha=$request->fecha;
        //$mascotas->sexo=$request->sexo;
        //$mascotas->ide=$request->ide;
        //$mascotas->idco=$request->idco;
        //$mascotas->observaciones=$request->observaciones;
        //$mascotas->save();

        $file = $request->file('foto');
        if ($file != '')
        {
        $fecha = date_create();
        $img = date_timestamp_get($fecha) . $file->getClientOriginalName();
        \Storage::disk('local')->put($img, \File::get($file));
        }
        else
        {
            $img = 'sinfoto.png';
        }

        $nombrecarti = '';
        $carti = $request->file('cartilla');
        if ($file != '')
        {
        $fecha = date_create();
        $nombrecarti = date_timestamp_get($fecha) . $carti->getClientOriginalName();
        \Storage::disk('carti')->put($nombrecarti, \File::get($carti));
        }

        $insertamascota =\DB::insert("INSERT INTO mascotas (nombre, edad, cp, costo, fecha, sexo, ide, observaciones, idco, created_at, updated_at, activo, foto, cartilla)
        VALUE('$request->nombre', $request->edad, $request->cp, $request->costo, '$request->fecha', '$request->sexo', $request->ide,'$request->observaciones', $request->idco, now(), now(), '$request->activo', '$img', '$nombrecarti')");
        Session::flash('mensaje', "La mascota $request->nombre se ha guardado correctamente");
        return redirect()->route('reportemascota');

    }

    public function reportemascota()
    {

        if(Session::get('sesionidu'))
        {
            $consulta = \DB::select("SELECT m.idma, m.nombre as masco, m.sexo, e.nombre as espe, c.nombre as colo, m.activo, m.foto
            FROM mascotas AS m 
            INNER JOIN especies AS e ON e.ide = m.ide
            INNER JOIN colores AS c ON c.idco  = m.idco
            order by masco asc");
            //return $consulta;

        return view ('mascotas.reportemas')->with('consulta', $consulta);
        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login.login');
        }
    }

    public function editamascota($idma)
    {

        $infomascota =\DB::select("SELECT m.cartilla, m.foto, m.idma, m.nombre, m.edad, m.cp, m.costo, m.fecha, m.sexo, m.ide, e.nombre AS especie, m.idco, c.nombre AS color, m.observaciones, m.activo
        FROM mascotas AS m 
        INNER JOIN especies AS e ON e.ide = m.ide
        INNER JOIN colores AS c ON c.idco= m.idco
        WHERE idma = $idma");

        if($infomascota[0]->cartilla !='')
        {
        $extensionarchivo = explode('.', $infomascota[0]->cartilla);
        $extension = $extensionarchivo[1];
        }
        else
        {
            $extension = 'NA';
        }

        $colores= colores::where('idco', '<>', $infomascota[0]->idco)
        -> orderby('nombre', 'Asc')
        ->get();
 
        $especies = especies::where('ide', '<>', $infomascota[0]->ide)
        -> orderby('nombre', 'Asc')
        ->get();
        //return $infomascota;
        //echo "El animalito seleccionado es:" . $idma;
        return view('mascotas.editamascota')
        ->with('infomascota', $infomascota[0])
        ->with('colores', $colores)
        ->with('especies', $especies)
        ->with('extension', $extension);
    }

    public function guardacambios(request  $request)
    {
        
        $this->validate($request,[   
            'nombre'=>'regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,Ü,ñ,Ñ]+$/',
            'edad'=>'required|numeric|integer|max:20',
            'cp'=>'regex:/^[0-9]{5}$/',
            'costo'=>'regex:/^[0-9]+[.][0-9]{2}$/',
            'fecha'=>'required|date',
            'foto'=>'mimes:jpg,png,gif,jpeg',
            'cartilla' =>'mimes:pdf, docx'
        ]);

        $file = $request->file('foto');
        if ($file != '')
        {
        $fecha = date_create();
        $img = date_timestamp_get($fecha) . $file->getClientOriginalName();
        \Storage::disk('local')->put($img, \File::get($file));
        }

        $mascotas = mascotas::find($request->idma);
        $mascotas->nombre=$request->nombre;
        $mascotas->edad=$request->edad;
        $mascotas->cp=$request->cp;
        $mascotas->costo=$request->costo;
        $mascotas->fecha=$request->fecha;
        $mascotas->sexo=$request->sexo;
        $mascotas->ide=$request->ide;
        $mascotas->idco=$request->idco;
        $mascotas->observaciones=$request->observaciones;
        if ($file != '')
        {
            $mascotas->foto=$img;
        }
        $mascotas->activo=$request->activo;
        $mascotas->save();

        

        Session::flash('mensaje', "La información de la mascota $request->nombre se ha editado correctamente");
        return redirect()->route('reportemascota');


        //return $request;
    }

    public function desactivamascota($idma)
    {
        $mascotas = mascotas::find($idma);
        $mascotas->activo='no';
        $mascotas->save();

        Session::flash('mensaje', "La mascota de clave $idma ha sido desactivada");
        return redirect()->route('reportemascota');
        //echo "La mascota a desactivar es $idma";
    }

    public function activamascota($idma)
    {
        $mascotas = mascotas::find($idma);
        $mascotas->activo='si';
        $mascotas->save();

        Session::flash('mensaje', "La mascota de clave $idma ha sido activada");
        return redirect()->route('reportemascota');
    }

    public function eliminamascota($idma)
    {

        $borramascota = \DB::delete("DELETE from mascotas WHERE idma = $idma");

        Session::flash('mensaje', "La mascota de clave $idma ha sido eliminada");
        return redirect()->route('reportemascota');
    }


}
