<html>
    <head>
    <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.min.css')}}">
</head>
<body>
<center><h1> Alta de juegos</h1></center>
<form action = "{{route('guardajuego')}}" method="POST">
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
            <td algin = 'right'> * Consola:</td>
            <td><select  class="form-label mt-4" name = 'idc'>
                @foreach($todasconsolas as $tc)
                <option value = '{{$tc->idc}}'>{{$tc->nombre}}</option>
                @endforeach
                </select></td>
        </tr>
        <tr>
            <td algin = 'right'> * Tipo:</td>
            <td><select  class="form-label mt-4" name = 'idt'>
                @foreach($todostipos as $tt)
                <option value = '{{$tt->idt}}'>{{$tt->nombre}}</option>
                @endforeach
                </select></td>
        </tr>
        <tr>
            <td align ='right'>* Cantidad:</td>
            <td>
            @if($errors->first('cantidad'))
            <p class="text-warning">{{$errors->first('cantidad')}}</p>
            @endif
                <input type='text' class="col-form-label col-form-label-sm mt-4" name = 'cantidad' value="{{old('cantidad')}}" placeholder ='Teclea la cantidad'></td>
        </tr>
        <tr>
        <td align ='right'>* Costo:</td>

            <td><div class="form-check">
                <input type ='radio' class="form-check-input"name = 'costo' value = '100' checked >100<br>
                <input type ='radio' class="form-check-input"name = 'costo' value = '200' > 200<br>
                <input type ='radio' class="form-check-input"name = 'costo' value = '300' > 300
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
    <body>
</html>