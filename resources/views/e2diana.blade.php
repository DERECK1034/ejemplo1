<html>
    <head>
    <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.min.css')}}">
    </head>
    <body>
        <center>
        <h1>Se dio de alta a </h1>
            <table class ="table table-hover" border =1>
                <tr>
                    <td>Foto</td>
                    <td>CV</td>
                </tr>
                @foreach($consulta as $c)
                <h1>{{$c->nombre}}
                <tr>
                    <td><img src = "{{asset('archivos/'.$c->foto)}}" height =100 width=100></td>
                    <td>
                    <a href = "{{asset('formatos/'.$c->cv)}}" target = '_blank'>
                    <img src = " {{asset('archivos/pdf.png')}}" height = 100 width = 100>
                        </td>
                @endforeach
            </table></center>
</center>
</body>
</html>