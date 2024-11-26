<html>
    <head>
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href ="{{asset ('css/bootstrap.min.css')}}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <script type="text/javascript">
    $(document).ready(function(){
        $("#reinicia").click(function() {
            $("#mensaje").load('{{url('validauser')}}' + '?' + $(this).closest('form').serialize()) ;
        });

        $("#otro").click(function() {
            $("#seleccionacaptcha").load('{{url('captchanuevo')}}') ;
        });
    });
    </script>

    <body>
        <center>
        Reinicia Password 
        <br><br>
        Introduce tu correo y te enviaremos un link de registro 
        <br>
        <form id="formu">
            Email
            <input type="text" name="correo" id="correo">
            <br><br>
            Captcha <br>
        <div id='seleccionacaptcha'>
            <img src="{{asset('captchas/'.$captcha->ruta)}}" height='120' width='150'>
            <input type="button" value="Otro" id="otro" class="btn btn-info btn-sm" >
            <br>
        
            <br>
            Teclea el valor del captcha
            <input type="hidden" name="textcap" id="textcap" value="{{$captcha->idcap}}"><br>
        </div>
            <input type="text" name="captcha">
            <input type="button" class="btn btn-success btn-sm"  value="Reinicia Password" id="reinicia">
        </form>
        <div id="mensaje">

        </div>
        </center>
    
    </body>
</html>