<table border = 1>
    <tr><td colspan=2>Información del cliente</td></tr>
    <tr>
        <td>Foto <br>
        <img src= "{{asset('fotoclientes/'.$cliente->archivo)}}" height=150 width=100>
</td>
        <td>Nombre {{$cliente->nombre}}
            <br>Sexo {{$cliente->sexo}}
            <br>Tipo {{$cliente->tipo}}
</td>
</tr>
</table>