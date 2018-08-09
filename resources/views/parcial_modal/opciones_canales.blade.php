<option value="">Selecciona</option>
@foreach($canales as $reg)
<option value="{{$reg->id}}">{{$reg->nombre}}</option>
@endforeach