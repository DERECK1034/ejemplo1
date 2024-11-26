
    @extends('mascotas.principal')

    @section('contenido')
        <h1> Reporte de mascotas </h1>
        <a href="{{ route('altamascotas') }}">
            <button type="button" class="btn btn-success"> Alta de mascota </button>
        </a>
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
                <td>Foto</td>
                <td>Nombre</td>
                <td>Sexo</td>
                <td>Especie</td>
                <td>Color</td>
                <td>Opciones</td>
            </tr>
            @foreach($consulta as $c)
            <tr>
                <td><img src = "{{asset('archivos/'.$c->foto)}}" height =80 width=80></td>
                <td>{{$c->masco}}</td>
                <td>{{$c->sexo}}</td>
                <td>{{$c->espe}}</td>
                <td>{{$c->colo}}</td>
                <td>
                @if($c->activo == 'si')
                    <a href="{{ route('editamascota', ['idma'=> $c->idma]) }}">
                        <button type="button" class="btn btn-info">Editar</button>
                    </a>
                    @if(Session::get('sesiontipo')=='Administrador')
                    <a href="{{ route('desactivamascota', ['idma'=> $c->idma]) }}">
                        <button type="button" class="btn btn-warning">Desactivar</button>
                    </a>
                    @endif
                @else
                    @if(Session::get('sesiontipo')== 'Administrador')
                    <a href="{{ route('activamascota', ['idma'=> $c->idma]) }}">
                        <button type="button" class="btn btn-primary">Activar</button>
                    </a>
                    <a href="{{ route('eliminamascota', ['idma'=> $c->idma]) }}">
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </a>
                    @endif
                 
                @endif
                </td>
            </tr>
            @endforeach
        </table></center>
@stop