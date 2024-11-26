@extends('mascotas.principal')

@section('contenido')

<script type="text/javascript">
$(document).ready(function(){
    jQuery("#descux").on('input', function () {
           jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
         });


         $("#idcli").click(function() {
            $("#infocliente").load('{{url('infocliente')}}'+'?idcli='+this.options[this.selectedIndex].value) ;
         });

         $("input[name=tipoprod]").click(function () {
		   x =  $('input:radio[name=tipoprod]:checked').val();
           $("#idprod").load('{{url('infoproducto')}}'+'?categoria='+x);
           console.log(x);
		  });



          $("#idprod").click(function() {
            $("#infoprod").load('{{url('detalleproducto')}}'+'?idprod='+this.options[this.selectedIndex].value) ;
         });

         $("#cantidad").keyup(function () {
            existencia = parseInt($("#existencia").val());
		    x = parseInt($("#cantidad").val());
            costo = parseInt($("#costo").val());
            if(existencia>=x)
            {
                subtotal = x * costo;
                $("#subtotal").val(subtotal);
                $("#total").val(subtotal);
                $("#agregar").removeAttr('disabled');
            }
            else
            {
               alert("la existencia es menor que la cantidad solicitada");   
               $("#subtotal").val(0);
               $("#cantidad").val(0);
            }
		  });

          $("input[name=descuento]").click(function () {
           tot = parseInt($("#subtotal").val());
		   x =  $('input:radio[name=descuento]:checked').val();
           if (x=="No")
           {
            $("#descux").val(0);
            $("#descux").attr('disabled','disabled');
            $("#total").val(tot);
           }
           else{
            $("#descux").val(0);
            $("#descux").removeAttr('disabled');
           }
		  });

          $("#descux").keyup(function(){
            st = parseInt($("#subtotal").val());
            desc = parseInt($("#descux").val());
            total = st-st*desc/100;
            $("#total").val(total);

          });

          $("#agregar").click(function() {
		 $("#lista").load('{{url('agregaelemento')}}' + '?' + $(this).closest('form').serialize()) ;
	    });

        
        });
        
</script>

    <center><h1>Nueva venta</h1>
    <form>
        <table >
        <tr>
        <td>No de Venta</td>
        <td> <input type= 'text' name = 'idven' value = '{{$iddventa}}' readonly = 'readonly'>
        </td></tr>
        <tr>
        <td>Vendedor</td>
        <td><input type = 'text' name = 'vendedor' value = '{{$nombreusuario}}' readonly= 'readonly'>
        <input type = 'hidden' name = 'idu' value = '{{$idu}}'>
        </td></tr>
        <tr><td>Fecha:</td>
            <td><input type = 'date' name = 'fecha' value = '{{$fecha}}'>
            </td></tr>
        <tr><td>Cliente:</td>
            <td><select name = 'idcli' id = 'idcli'>
                @foreach($clientes as $c)
                <option value = '{{$c->idcli}}'> Clave: {{$c->idcli}} - {{$c->nombre}} {{$c->apellido}}</option>
                @endforeach
                </select>
</td></tr>
<tr><td colspan= 2> <div id = 'infocliente'></div></td></tr>
<tr><td>Tipo de producto</td>
<td> <input type = 'radio' value ='1' name ='tipoprod' id='tipoprod1'>Productos
    <input type = 'radio' value ='2' name ='tipoprod' id='tipoprod2'>Medicamentos
</td></tr>
<tr><td>Seleccione Producto</td>
    <td><select name = 'idprod' id='idprod'></select>
        <div  id = 'infoprod' >

        </div>
       </td></tr>
<tr><td>Teclea Cantidad</td>
    <td><input type = 'text' name = 'cantidad' id='cantidad' value = '0'>
</td></tr>
<tr><td>Subtotal</td>
    <td><input type = 'text' name = 'subtotal' id='subtotal' value = '0' readonly = 'readonly'>
</td></tr>
<tr><td>Descuento</td>
    <td><input type = 'radio' name = 'descuento' id='descuento' value = 'Si'>Si
    <input type = 'radio' name = 'descuento' id='descuento' value = 'No' checked>No
</td>
</tr>
<tr><td>
Teclea el descuento</td>
<td><input type ='text' name = 'descux' id= 'descux' value = '0' disabled = 'disabled'>
</td>
</tr>
<tr><td>
Total a pagar</td>
<td><input type = 'text' name  ='total' id='total'></td></tr>
<tr><td colspan = 2>
    <button type="button" class="btn btn-success"  id='agregar' disabled >Agregar</button>
</td></tr>
</table>
    </form>
    <div id="lista">
    </div>
 </center>
@stop