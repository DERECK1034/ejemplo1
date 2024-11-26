<html>
<head>
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.min.css')}}">
</head>
    <body>
    <center><h1>Editar Producto</h1>
<br>
<form action = "{{ route('guardacambios') }}" method="POST" enctype ="multipart/form-data">
        {{ csrf_field()}}
        <input type= 'hidden' name= 'idp' value="{{$info->idp}}">
        <table border=1>
        <tr>
            <td align ='right'>* Clave</td>
            <td>
            @if($errors->first('clave'))
            <p class="text-warning">{{$errors->first('clave')}}</p>
            @endif
                <input type='text' class="col-form-label col-form-label-sm mt-4" name = 'clave' value="{{$info->clave}}" placeholder ='Teclea la clave'></td>
        </tr>
        <tr>
            <td algin = 'right'> * Marca:</td>
            <td><select  class="form-label mt-4" name = 'idma'>
            
                <option value='{{$info->idma}}'>{{$info->marca}}</option>
                @foreach($marcas as $m)
                <option value='{{$m->idma}}'>{{$m->nombre}}</option>
                @endforeach
                </select></td>
        </tr>

        <tr>
            <td algin = 'right'> * Submarca:</td>
            <td><select  class="form-label mt-4" name = 'idsm'>
            
                <option value='{{$info->idsm}}'>{{$info->submarca}}</option>
                @foreach($submarcas as $s)
                <option value='{{$s->idsm}}'>{{$s->nombre}}</option>
                @endforeach
                </select></td>
        </tr>
        <tr>
            <td align ='right'>* Cadena 1</td>
            <td>
            @if($errors->first('cadena1'))
            <p class="text-warning">{{$errors->first('cadena1')}}</p>
            @endif
                <input type='text' class="col-form-label col-form-label-sm mt-4" name = 'cadena1' value="{{$info->cadena1}}" placeholder ='Teclea la cadena'></td>
        </tr>
        <tr>
            <td align ='right'>* Cadena 2</td>
            <td>
            @if($errors->first('cadena2'))
            <p class="text-warning">{{$errors->first('cadena2')}}</p>
            @endif
                <input type='text' class="col-form-label col-form-label-sm mt-4" name = 'cadena2' value="{{$info->cadena2}}" placeholder ='Teclea la cadena'></td>
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
    
    </body>
</html>