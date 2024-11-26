@extends('mascotas.principal')

@section('contenido')
    <center><h1> Alta de mascotas</h1></center>
    <form action = "{{route('guardamascota')}}" method="POST" enctype ="multipart/form-data">
        {{ csrf_field()}}
        <center><table border=1>
        <tr>
            <td align ='right'>* Nombre:</td>
            <td>
            @if($errors->first('nombre'))
            <p class="text-warning">{{$errors->first('nombre')}}</p>
            @endif
                <input type='text' class="col-form-label col-form-label-sm mt-4" name = 'nombre' value="{{old('nombre')}}" placeholder ='Teclea el nombre'></td>
        </tr>
        <tr>
        <td align ='right'>* Edad:</td>
            <td>
            @if($errors->first('edad'))
            <p class="text-warning">{{$errors->first('edad')}}</p>
            @endif
            <input type ='text' class="col-form-label col-form-label-sm mt-4" name = 'edad' value="{{old('edad')}}" placeholder = 'Teclea la edad' ></td>
        </tr>
        <tr>
        <td align ='right'>* CP:</td>
            <td>
            @if($errors->first('cp'))
            <p class="text-warning">{{$errors->first('cp')}}</p>
            @endif<input type ='text' class="col-form-label col-form-label-sm mt-4" name = 'cp' value="{{old('cp')}}" placeholder = 'Ejemplo: 72700' ></td>
        </tr>
        <tr>
        <td align ='right'>* Costo:</td>
            <td>
            @if($errors->first('costo'))
            <p class="text-warning">{{$errors->first('costo')}}</p>
            @endif<input type ='text' class="col-form-label col-form-label-sm mt-4" name = 'costo' value="{{old('costo')}}" placeholder = 'Ejemplo: 13.50' ></td>
        </tr>
        <tr>
        <td align ='right'>* Fecha de nacimiento:</td>
            <td>
            @if($errors->first('fecha'))
            <p class="text-warning">{{$errors->first('fecha')}}</p>
            @endif
            <input type ='date' class="col-form-label col-form-label-sm mt-4" name = 'fecha' value="{{old('fecha')}}" ></td>
        </tr>
        <tr>
        <td align ='right'>* Sexo:</td>

            <td><div class="form-check">
                <input type ='radio' class="form-check-input"name = 'sexo' value = 'h' checked >Hembra<br>
                <input type ='radio' class="form-check-input"name = 'sexo' value = 'm' >    Macho
        </div></td>

        </tr>
        <tr>
            <td algin = 'right'> * Especie:</td>
            <td><select  class="form-label mt-4" name = 'ide'>
                @foreach($todasespecies as $te)
                <option value = '{{$te->ide}}'>{{$te->nombre}}</option>
                @endforeach
                </select></td>
        </tr>
        <tr>
            <td algin = 'right'> * Color:</td>
            <td><select  class="form-label mt-4" name = 'idco'>
                @foreach($todoscolores as $tc)
                <option value = '{{$tc->idco}}'>{{$tc->nombre}}</option>
                @endforeach
                </select></td>
        </tr>
        <tr>
            <td align ='rigth'> *Observaciones</td>
            <td><textarea class="form-label mt-4" name = 'observaciones'></textarea></td>
        </tr>
        <tr>
            <td align='right'>*Foto</td>
                <td>
                @if($errors->first('foto'))
            <p class="text-warning">{{$errors->first('foto')}}</p>
            @endif<input type = 'file' name ='foto' class="form-control">
            </td>
        </tr>

        <tr>
            <td align='right'>*Cartilla vacunación</td>
                <td>
                @if($errors->first('cartilla'))
            <p class="text-warning">{{$errors->first('cartilla')}}</p>
            @endif<input type = 'file' name ='cartilla' class="form-control">
            </td>
        </tr> 


        <tr>
        <td align ='right'>* Activo:</td>

            <td><div class="form-check">
                <input type ='radio' class="form-check-input"name = 'activo' value = 'si' checked >Si<br>
                <input type ='radio' class="form-check-input"name = 'activo' value = 'no' >No
        </div></td>
        </tr>
        <tr>
        <td align ='right' colspan = 2>
            <input  type='submit' class="btn btn-outline-dark" name = 'guardar' value = 'guardar'>
        </td>
        </tr>
        <tr>
            <td align ='right' colspan = 2>
            <i>Los campos con * son obligatorios</i>
        </td>
    </table></center>
    </form>
@stop