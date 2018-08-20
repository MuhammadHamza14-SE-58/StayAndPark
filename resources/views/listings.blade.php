@extends('layouts.app')

@section('content')

    <center>
        <p style="font-size: 30px">Our Featured Listings</p>

    </center>
    <div class="card-deck">
        <div class="row">
            @foreach($properties as $property)
                @foreach($images as $image)
                    @if($property->id==$image->house_id)
                        <div class="col-md-4" style="margin-top: 25px">
                            <div class="card">
                                <a style="text-decoration: none;color:black;" href="/listing/{{$property->id}}">
                                    <img class="card-img-top" src="{{$image->path}}" alt="Card image cap">
                                    {{--<i class="fa fa-home card-image-top " aria-hidden="true"></i>--}}
                                    @break
                                    @endif
                                    @endforeach

                                    <div class="card-block">
                                        <p class="card-text">{{$property->name}}
                                            <br>
                                            Rs.{{$property->price}}
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <center>
                                            <small style="display: inline;"
                                                   class="text-muted">{{$property->listingType}}</small>
                                        </center>
                                </a>
                            </div>
                        </div>
        </div>
        @endforeach
    </div>
    <br>
    <br>
    <br>
    <div class="row">

    </div>

    </div>
@endsection