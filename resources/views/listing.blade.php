@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <h5>{{$listing->propertyType}}</h5>
                <h1>{{$listing->name}}</h1>
                <h3>{{$listing->address}}</h3>
                <h3>Price: {{$listing->price}} Per Day</h3>
                @if($listing->listingType!='Parking')
                    <h2>Features</h2>
                    <h4><i class="fa fa-4x fa-bed"
                           aria-hidden="true">&nbsp;&nbsp;&nbsp;&nbsp;Rooms:{{$listing->rooms}}</i>
                    </h4>
                    <h4><i class="fa fa-4x fa-bath"
                           aria-hidden="true">&nbsp;&nbsp;&nbsp;&nbsp;Baths:{{$listing->baths}}</i>
                    </h4>
                    <h4><i class="fa fa-4x fa-coffee"
                           aria-hidden="true">&nbsp;&nbsp;&nbsp;&nbsp;Kitchen:{{$listing->kitchen}}</i></h4>
                    <h4><i class="fa fa-4x fa-wifi" aria-hidden="true">&nbsp;&nbsp;&nbsp;Wifi:{{$listing->wifi}}</i>
                    </h4>
                    <h4><i class="fa fa-4x fa-shirtsinbulk"
                           aria-hidden="true">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Iron:{{$listing->iron}}</i></h4>
                    <h4><i class="fa fa-4x fa-car"
                           aria-hidden="true">&nbsp;&nbsp;&nbsp;&nbsp;Parking:{{$listing->parking}}</i></h4>
                @endif
                <h3>Owner Mobile Number</h3>
                <h4><i class="fa fa-4x fa-phone" aria-hidden="true">&nbsp;{{$listing->phone}}</i></h4>

                @if($listing->additionalComments!=null)
                    <h3>Additional Comments</h3>
                    <h4><i class="fa fa-4x fa-pencil" aria-hidden="true">&nbsp;{{$listing->additionalComments}}</i></h4>

                @endif
            </div>
            <div class="col col-md-8">


                @foreach($images as $img)
                    @if($img->house_id==$listing->id)

                        <img src="{{$img->path}}" style="width:100%;height: 300px ">



                    @endif
                @endforeach
            </div>

        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div style="width: 100%; height: 500px;">
                {!! Mapper::render() !!}

            </div>
        </div>
    </div>
    {{--<div class="row">--}}
    {{--@for ($i=1;$i<=5;$i++)--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="card">--}}
    {{--<img class="card-img-top" src="img/mazareQuaid.jpg" alt="Card image cap">--}}
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


    </div>


@endsection
