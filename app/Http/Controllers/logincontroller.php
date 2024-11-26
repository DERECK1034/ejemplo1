<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\usuarios;
use App\Models\captchas;
use App\Mail\notificacion;
use Illuminate\Support\Facades\Mail;

use Session;

class logincontroller extends Controller
{
    public function inicio()
    {
        if(Session::get('sesionidu'))
        {
            return view('mascotas.inicio');
        }
        else
        {
            Session::flash('mensaje', "Es necesario iniciar sesión");
            return view('login.login');
        }
    }

    public function login()
    {
        return view('login.login');
    }
    public function validar(request $request)
    {
        $correo=$request->correo;
        $password=md5($request->password);
        //return $request;
        $acceso = usuarios::where('correo','=',$correo)
                            ->where('password','=',$password)
                            ->where('activo','=','Si')
                            ->get();

        $cuantos = count($acceso);
        if($cuantos==0)
        {
            Session::flash('mensaje', "El usuario o password son incorrectos");
            return redirect()->route('login');
        }
        else
        {

            Session::put('sesionname', $acceso[0]->nombre.' ' .$acceso[0]->apellido);
            Session::put('sesionidu', $acceso[0]->idu);
            Session::put('sesiontipo', $acceso[0]->tipo);

            return redirect()->route('inicio');
        }
                            
    }


    public function cerrarsesion()
    {
        Session::forget('sesionname');
        Session::forget('sesionidu');
        Session::forget('sesiontipo');
        Session::flush();
        Session::flash('mensaje', 'sesion cerrada correctamente');
        return redirect()->route('login');
    }

    public function newpassword()
    {

        $idc = rand(1,4);

        $captcha = captchas::where('idcap', '=', $idc)
        ->get();
        //return $captcha;
        return view('login.recuperapass')->with('captcha', $captcha[0]);
    }

    public function validauser(Request $request)
    {
        $usuario = usuarios::where('correo','=',$request->correo)
                    ->where('activo','=','Si')
                    ->get();
        $cuantos = count($usuario);

        $captcha = captchas::where('idcap','=',$request->textcap)
                        ->get();
        if ($captcha[0]->valor != $request->captcha)
        {
            $bandera = 1;
        }
        if($cuantos==0)
        {
            $bandera  = 2;
        }
        if($cuantos>=1 and $captcha[0]->valor == $request->captcha)
        {
            $bandera = 3;
        }
        return view('login.resultadocaptcha')
        ->with('bandera', $bandera);
    }

    public function captchanuevo()
    {
        $idc=rand(1,4);
        $captcha = captchas::where('idcap', '=', $idc)
        ->get();
        return view('login.captchanuevo')
        ->with('captcha',$captcha[0]);
    }

    public function mandacorreo(){
        $response=Mail::to('diana.gonzalez2304@uppuebla.edu.mx')
                ->send(new notificacion ("Diana"));
        dump($response);
    }

}
