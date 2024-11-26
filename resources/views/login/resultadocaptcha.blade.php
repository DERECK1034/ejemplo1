<style>
    .alerta{
        width: 500px;
    }
</style>
@if($bandera==1)
<div class="alerta">
    <div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Oh no!</strong>  El captcha no es correcto
    </div>
</div>

@endif
@if($bandera==2)
<div class="alerta">
    <div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Oh no!</strong>  el correo no existe o se encuentra desactivado, contacte al administrador
    </div>
</div>
@endif
@if($bandera==3)
<div class="alerta">
    <div class="alert alert-dismissible alert-success">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Muy bien!</strong> Se enviará un correo electronico un link de recuperacion a la cuenta seleccionada
    </div>
</div>
@endif
