<html>
    <head>
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.min.css')}}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
    </head>
    <body>
    <center><form action="{{ route('validar') }}" method="POST" enctype ="multipart/form-data">
        {{ csrf_field()}}
            <table>
                <tr>
                    <td class="col-form-label col-form-label-sm mt-4">Teclea correo:</td>
                    <td><input type='text'  class="form-control form-control-sm" name = 'correo'></td>
                </tr>
                <tr>
                    <td class="col-form-label col-form-label-sm mt-4" >Teclea password:</td>
                    <td><input type='text'  class="form-control form-control-sm" name='password'></td>
                </tr>
                <tr>
                    <td colspan =2></td>
                    <td><input type ='submit'  class="btn btn-secondary" value = 'iniciar'></td>
                </tr>
            </table>

            @if (Session:: has('mensaje'))
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Error</strong> {{ Session::get('mensaje')}}
            </div>   
            
            @endif
            <tr>
                <td>
                    ¿Olvidaste tu contraseña? 
                    <a href="{{ route('newpassword') }}">Clic aquí</a>
                </td>
            </tr>
        </form></center>
    </body>
</html> 