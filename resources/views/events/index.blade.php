
@foreach($events as $event)
<div class="event">
    <h2>{{$event->name}}</h2>
</div>
<p>Fecha:{{$event->date}}</p>
<p>Hora:{{$event->time}}</p>
<p>Ubicacion:{{$event->location}}</p>
@endforeach