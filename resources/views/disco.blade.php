<html>
<head>
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.min.css')}}">

</head>
<body>
<center><h1>Discografía</h1></center>
<form action = "{{route('guardadisco')}}" method="POST">
        {{ csrf_field()}}
<center><table border = 1>
    <tr>
    <td align="right">* Nombre:</td>
                    <td>
                    @if($errors->first('nombre'))
                    <p class="text-warning">{{$errors->first('nombre')}}</p>
                    @endif
                        <input type='text' class="form-control form-control-sm" name='nombre' value="{{ old('nombre') }}" placeholder='Teclea el nombre'>
                    </td>
    </tr>
    <tr>
            <td algin = 'right'> * Artista:</td>
            <td><select  class="form-label mt-4" name = 'ida'>
                @foreach($todosartistas as $ta)
                <option value = '{{$ta->ida}}'>{{$ta->nombre}}</option>
                @endforeach
                </select></td>
    </tr>
    <tr>
                    <td align='right'>* Fecha:</td>
                    <td>
                    @if($errors->first('fecha'))
                    <p class="text-warning">{{$errors->first('fecha')}}</p>
                    @endif
                        <input type='date' class="form-control form-control-sm" name='fecha' value="{{ old('fecha') }}">
                    </td>
    </tr>
    <tr>
                    <td align='right'>* Género:</td>
                    <td>
                        <div class="form-check">
                            <input type='radio' class="form-check-input" name='genero' value='rock' checked> Rock<br>
                            <input type='radio' class="form-check-input" name='genero' value='pop'> Pop <br>
                            <input type='radio' class="form-check-input" name='genero' value='banda'> Banda
                        </div>
                    </td>
    </tr>
    <tr>
    <td align="right">* Clave1:</td>
                    <td>
                    @if($errors->first('clave1'))
                    <p class="text-warning">{{$errors->first('clave1')}}</p>
                    @endif
                        <input type='text' class="form-control form-control-sm" name='clave1' value="{{ old('clave1') }}">
                    </td>
    </tr>
    <tr>
    <td align="right">* Clave2:</td>
                    <td>
                    @if($errors->first('clave2'))
                    <p class="text-warning">{{$errors->first('clave2')}}</p>
                    @endif
                        <input type='text' class="form-control form-control-sm" name='clave2' value="{{ old('clave2') }}">
                    </td>
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
        </tr>

</table></center>
</form>

</body>
</html>