@foreach($productos as $p)
    <option value="{{$p->idprod}}"> {{$p->nombre}}</option>
@endforeach