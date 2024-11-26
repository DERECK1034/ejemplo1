@extends('mascotas.principal')

@section('contenido')

<center><h1>Editar una Mascota</h1>
<br> 
<form action = "{{ route('guardacambios') }}" method="POST" enctype ="multipart/form-data">
        {{ csrf_field()}}
        <input type= 'hidden' name= 'idma' value="{{$infomascota->idma}}">
        <table border=1>
        <tr>
            <td align ='right'>* Nombre:</td>
            <td>
            @if($errors->first('nombre'))
            <p class="text-warning">{{$errors->first('nombre')}}</p>
            @endif
                <input type='text' class="col-form-label col-form-label-sm mt-4" name = 'nombre' value="{{$infomascota->nombre}}" placeholder ='Teclea el nombre'></td>
        </tr>
        <tr>
        <td align ='right'>* Edad:</td>
            <td>
            @if($errors->first('edad'))
            <p class="text-warning">{{$errors->first('edad')}}</p>
            @endif
            <input type ='text' class="col-form-label col-form-label-sm mt-4" name = 'edad' value="{{$infomascota->edad}}" placeholder = 'Teclea la edad' ></td>
        </tr>
        <tr>
        <td align ='right'>* CP:</td>
            <td>
            @if($errors->first('cp'))
            <p class="text-warning">{{$errors->first('cp')}}</p>
            @endif<input type ='text' class="col-form-label col-form-label-sm mt-4" name = 'cp' value="{{$infomascota->cp}}" placeholder = 'Ejemplo: 72700' ></td>
        </tr>
        <tr>
        <td align ='right'>* Costo:</td>
            <td>
            @if($errors->first('costo'))
            <p class="text-warning">{{$errors->first('costo')}}</p>
            @endif<input type ='text' class="col-form-label col-form-label-sm mt-4" name = 'costo' value="{{$infomascota->costo}}" placeholder = 'Ejemplo: 13.50' ></td>
        </tr>
        <tr>
        <td align ='right'>* Fecha de nacimiento:</td>
            <td>
            @if($errors->first('fecha'))
            <p class="text-warning">{{$errors->first('fecha')}}</p>
            @endif
            <input type ='date' class="col-form-label col-form-label-sm mt-4" name = 'fecha' value="{{$infomascota->fecha}}" ></td>
        </tr>
        <tr>
        <td align ='right'>* Sexo:</td>

            <td>
            @if($infomascota->sexo=='h')    
            <div class="form-check">
                <input type ='radio' class="form-check-input"name = 'sexo' value = 'h' checked >Hembra<br>
                <input type ='radio' class="form-check-input"name = 'sexo' value = 'm' >    Macho
                </div>
            @else
            <div class="form-check">
                <input type ='radio' class="form-check-input"name = 'sexo' value = 'h'>Hembra<br>
                <input type ='radio' class="form-check-input"name = 'sexo' value = 'm' checked >    Macho
                </div>
            @endif
        </div></td>

        </tr>
        <tr>
            <td algin = 'right'> * Especie:</td>
            <td><select  class="form-label mt-4" name = 'ide'>
            
                <option value='{{$infomascota->ide}}'>{{$infomascota->especie}}</option>
                @foreach($especies as $e)
                <option value='{{$e->ide}}'>{{$e->nombre}}</option>
                @endforeach
                </select></td>
        </tr>
        <tr>
            <td algin = 'right'> * Color:</td>
            <td><select  class="form-label mt-4" name = 'idco'>
            <option value='{{$infomascota->idco}}'>{{$infomascota->color}}</option>
            @foreach($colores as $c)
            <option value='{{$c->idco}}'>{{$c->nombre}}</option>
            @endforeach
                </select></td>
        </tr>
        <tr>
            <td align ='rigth'> *Observaciones</td>
            <td><textarea class="form-label mt-4" name = 'observaciones'>{{$infomascota->observaciones}}</textarea></td>
        </tr>

        <tr>
            <td align='right'>*Foto</td>
                <td>
                @if($errors->first('foto'))
            <p class="text-warning">{{$errors->first('foto')}}</p>
            @endif
            <a href = "{{asset('archivos/'.$infomascota->foto)}}" target = '_blank'>
            <img src = "{{asset('archivos/'.$infomascota->foto)}}" height =80 width=80>
            </a>
            <input type = 'file' name ='foto' class="form-control">
            </td>
        </tr> 

        <tr>
            <td align='right'>*Cartilla vacunación</td>
                <td>
                @if($errors->first('cartilla'))
            <p class="text-warning">{{$errors->first('cartilla')}}</p>
            @endif
            @if($extension == 'pdf' or $extension == 'PDF')
            <a href = "{{asset('cartillas/'.$infomascota->cartilla)}}" target = '_blank'>
            <img src = " {{asset('archivos/pdf.png')}}" height = 100 width = 100>
            @elseif($extension == 'docx' or $extension == 'DOCX')
            <a href = "{{asset('cartillas/'.$infomascota->cartilla)}}" target = '_blank'>
            <img src = " {{asset('archivos/word.png')}}" height = 100 width = 100>
            @else
            <img src = " {{asset('archivos/nofile.png')}}" height = 100 width = 100>
            @endif
            {{$infomascota->cartilla}}

            <input type = 'file' name ='cartilla' class="form-control">
            </td>
        </tr> 

        <td align ='right'>* Activo:</td>

            <td>
            @if($infomascota->activo =='si')    
            <div class="form-check">
                <input type ='radio' class="form-check-input"name = 'activo' value = 'si' checked >Si<br>
                <input type ='radio' class="form-check-input"name = 'activo' value = 'no' >No
                </div>
            @else
            <div class="form-check">
                <input type ='radio' class="form-check-input"name = 'activo' value = 'si'>Si<br>
                <input type ='radio' class="form-check-input"name = 'activo' value = 'no' checked >No
                </div>
            @endif
        </div></td>
        <tr>
            @if(Session::get('sesiontipo')=='Administrador')
        <td align ='right' colspan = 2>
            <input  type='submit' class="btn btn-outline-dark" name = 'guardar' value = 'guardar'>
        </td>
        @endif
        </tr>
        <tr>
            <td align ='right' colspan = 2>
            <i>Los campos con * son obligatorios</i>
        </td>
    </table></center>
    </form>



@stop