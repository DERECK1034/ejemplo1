<?php

namespace App\Http\Controllers;
use App\Models\empleados;
use Session;

use Illuminate\Http\Request;

class empleadoscontroller extends Controller
{
    public function altaemp()
    {
        return view('e1diana');
    }


    public function guardaempleado(Request $request)
    {
        $this->validate($request,[  
            'nombre'=>'required|regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,Ü,ñ,Ñ]+$/',
            'edad'=>'required|regex:/^[0-9]{2}$/',
            'foto'=> 'mimes:jpg,png,gif,jpeg',
            'cv'=> 'mimes:pdf'
        ]);

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

        $nombrecv = '';
        $curri = $request->file('cv');
        if ($file != '')
        {
        $fecha = date_create();
        $nombrecv = date_timestamp_get($fecha) . $curri->getClientOriginalName();
        \Storage::disk('archiv')->put($nombrecv, \File::get($curri));
        }
        else
        {
            $nombrecv = 'nofile.png';
        }

        \DB::table('empleados')->insert([
            'idemp' => $request->idemp,
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'foto' => $img,
            'cv' => $nombrecv
        ]);

        $consulta = \DB::select("SELECT * FROM empleados WHERE idemp = $request->idemp");


        return view('e2diana')-> with ('consulta', $consulta);
    }
}
