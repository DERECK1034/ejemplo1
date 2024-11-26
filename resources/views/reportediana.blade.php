<html>
<head>
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.min.css')}}">
</head>
    <body>
    <center><h1> Reporte de Productos </h1></center>
        @if (Session:: has('mensaje'))
        
        <div>
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Felicidades</strong> {{ Session::get('mensaje')}}
            </div>
        </div>
        @endif
        <center><table class ="table table-hover" border =1>
            <tr>
                <td>Clave</td>
                <td>Marca</td>
                <td>Submarca</td>
                <td>Cadena 1</td>
                <td>Cadena 2</td>
                <td>Opciones</td>
            </tr>
            @foreach($consulta as $c)
            <tr>
                <td>{{$c->clave}}</td>
                <td>{{$c->marca}}</td>
                <td>{{$c->submarca}}</td>
                <td>{{$c->cadena1}}</td>
                <td>{{$c->cadena2}}</td>
                <td>
                    <a href="{{ route('editaproducto', ['idp'=> $c->idp]) }}">
                        <button type="button" class="btn btn-info">Editar</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table></center>

    </body>
</html>