<option value="">Selecciona</option>
@foreach($parametros as $reg)
<option value="{{$reg->id}}">{{$reg->nombre}}</option>
@endforeach