<html>
    <head>
    <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.min.css')}}">
    </head>
    <body>
        <center><h1>Alta empleados</h1></center>
        <form action = "{{route('guardaempleado')}}" method="POST" enctype ="multipart/form-data">
        {{ csrf_field()}}
        <br>
        <br>
        <center><table border 1>
        <tr align="right">
            <td align="right">* Código de empleado:</td>
                <td>
                    @if($errors->first('idemp'))
                    <p class="text-warning">{{$errors->first('idemp')}}</p>
                    @endif
                    <input type='text' class="form-control form-control-sm" name='idemp' value="{{ old('idemp') }}">
                </td>
            </tr>

        <tr>
            <td align="right">* Nombre:</td>
                <td>
                    @if($errors->first('nombre'))
                    <p class="text-warning">{{$errors->first('nombre')}}</p>
                    @endif
                    <input type='text' class="form-control form-control-sm" name='nombre' value="{{ old('nombre') }}">
                </td>
        </tr>

        <tr>
            <td align="right">* Edad:</td>
                <td>
                    @if($errors->first('edad'))
                    <p class="text-warning">{{$errors->first('edad')}}</p>
                    @endif
                    <input type='text' class="form-control form-control-sm" name='edad' value="{{ old('edad') }}">
                </td>

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
            <td align='right'>*CV</td>
            <td>
                @if($errors->first('cv'))
                    <p class="text-warning">{{$errors->first('cv')}}</p>
                @endif<input type = 'file' name ='cv' class="form-control">
            </td>
        </tr>

        <tr>
            <td align ='right' colspan = 2>
                <input  type='submit' class="btn btn-success" name = 'guardar' value = 'guardar'>
            </td>
        </tr>
        </table></center>
        </form>
        
    </body>
</html>