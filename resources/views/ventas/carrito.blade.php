Venta guardada y producto agregado
<br>
<table border = 1>
    <tr>
        <td>Clave</td>
        <td>Nombre</td>
        <td>Categoria</td>
        <td>Lote</td>
        <td>Cantidad</td>
        <td>Costo</td>
        <td>Subtotal</td>
        <td>Operaciones</td>
    </tr>

    @foreach($carritodetalle as $cd)
    <tr>
        <td>{{$cd ->idprod}}</td>
        <td>{{$cd ->producto}}</td>
        <td>{{$cd ->cat}}</td>
        <td>{{$cd ->lote}}</td>
        <td>{{$cd ->cantidad}}</td>
        <td>{{$cd ->costo}}</td>
        <td>{{$cd ->subtotal}}</td>
        <td>
        <form action='' method = 'POST' enctype='application/x-www-form-urlencoded'>
		      name='frmdo{{$cd->idvd}}' id='frmdo{{$cd->idvd}}' target='_self'>
		      <input type = 'hidden' value = '{{$cd->idvd}}' name = 'idvd' id= 'idvd'>
		      <input type = 'hidden' value = '{{$cd->idprod}}' name = 'idprod' id= 'idprod'>
              <input type = 'hidden' value = '{{$cd->idven}}' name = 'idven' id= 'idven'>
		      <input type='button' name='borrar' class='borrar' value='Eliminar' />
         </form>
        </td>
    </tr>
    @endforeach


</table>

<script type="text/javascript">
	$(function () {
		$('.borrar').click(
			function () {
				formulario = this.form;
							$("#lista").load('{{url('borraventas')}}' + '?' + $(this).closest('form').serialize()) ;
			}
		);
	});
	</script>