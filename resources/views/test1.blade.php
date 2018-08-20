@foreach($properties as $property)
    @foreach($images as $image)
        @if($property->id==$image->house_id)
            {{$image->path}}
            {{$property->name}}
            {{$property->id}}
            {{$property->price}}
            {{$property->path}}
        @endif
    @endforeach
    <br>
@endforeach