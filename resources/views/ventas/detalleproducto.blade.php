<table border= 1>
    <tr><td>Lote</td>
    <td>{{$producto->lote}}</td></tr>
    <tr><td>Fechacad</td>
    <td>{{$producto->fechacad}}</td></tr>
    <tr><td>Exsistencia</td>
    <td> <input type="text" name="existencia" value="{{$producto->existencia}}" id="existencia" readonly="readonly"></td></tr>
    <tr><td>Costo</td>
    <td><input type="text" name="costo" value="{{$producto->costo}}" id="costo" readonly="readonly"></td></tr>
</table>