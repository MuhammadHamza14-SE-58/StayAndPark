@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <h1>Search Results</h1>
            <div style="width: 100%; height: 500px;">
                {!! Mapper::render() !!}

            </div>
        </div>
        <br>
        <br>
        <br>
        {{--<div class="row">--}}
        {{--<div class="card-deck">--}}
        {{--<div class="row">--}}
        {{--@for ($i=1;$i<=5;$i++)--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="card">--}}
        {{--<img class="card-img-top" src="img/houseDefault.png" alt="Card image cap">--}}
        {{--<div class="card-block">--}}

        {{--<p class="card-text">Fully furnished Home Margalla Rawalpindi--}}
        {{--<br>--}}
        {{--Rs.500--}}

        {{--</p>--}}
        {{--</div>--}}
        {{--<div class="card-footer">--}}

        {{--<center>--}}

        {{--<small style="display: inline;" class="text-muted">Stay </small></center>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@if($i%3==0)--}}
        {{--</div>--}}
        {{--<br>--}}
        {{--<div class="row">--}}
        {{--@endif--}}
        {{--@endfor--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--@foreach($listings as $listing)--}}
        {{--<h1>{{$listing->id}}</h1>--}}
        {{--@endforeach--}}
        <div class="card-deck">
            <div class="row">
                @foreach($listings as $property)
                    <div class="col-md-4" style="margin-top: 25px">
                        <div class="card">
                            <a style="text-decoration: none;color:black;" href="/listing/{{$property->id}}">
                                @foreach($images as $image)
                                    @if($property->id==$image->house_id && $property->status=='active')
                                        <img class="card-img-top" src="{{$image->path}}" alt="Card image cap">
                                        @break
                                    @endif
                                @endforeach
                                {{--<i class="fa fa-home card-image-top " aria-hidden="true"></i>--}}
                                <div class="card-block">

                                    <p class="card-text">{{$property->name}}
                                        <br>
                                        Rs.{{$property->price}}
                                        {{--<br>--}}
                                        {{--{{$property->address}}--}}

                                    </p>
                                </div>
                                <div class="card-footer">

                                    <center>

                                        <small style="display: inline;"
                                               class="text-muted">{{$property->listingType}}</small>
                                        {{--<p style="display: inline;float: right;"> test</p>--}}
                                    </center>
                            </a>
                        </div>
                    </div>
            </div>


            @endforeach
        </div>


    </div>

@endsection
