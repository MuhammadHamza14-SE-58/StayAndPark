@extends('layouts.app')

@section('content')
    <div class="container">
        {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">Dashboard</div>--}}

        {{--<div class="panel-body">--}}
        {{--@if (session('status'))--}}
        {{--<div class="alert alert-success">--}}
        {{--{{ session('status') }}--}}
        {{--</div>--}}
        {{--@endif--}}

        {{--You are logged in--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/slider1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/slider2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/slider3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <br>


            <center><h1>Our Featured Places</h1></center>
            <br>
        </div>

        <div class="row" >
            <div class="card-deck">
                <div class="card">
                    <a style="text-decoration: none;color:black;display: inline" href="/search/{karachi}">

                        <img class="card-img-top" src="img/mazareQuaid.jpg" alt="Card image cap">
                        <div class="card-block">
                            <center><h4 class="card-title">Karachi</h4></center>
                        </div>
                    </a>
                </div>


                <div class="card">
                    <a style="text-decoration: none;color:black;display: inline" href="/search/{islamabad}">

                        <img class="card-img-top" src="img/faisalMasjid.gif" alt="Card image cap">
                        <div class="card-block">
                            <center><h4 class="card-title">Islamabad</h4></center>
                        </div>
                    </a>
                </div>


                <div class="card">
                    <a style="text-decoration: none;color:black;display: inline" href="/search/{lahore}">

                        <img class="card-img-top" src="img/minarePakistan.jpg" alt="Card image cap">
                        <div class="card-block">
                            <center><h4 class="card-title">Lahore</h4></center>

                        </div>
                    </a>

                </div>
            </div>

        </div>
        <br>
        <br>
        <br>
        {{--@if(Auth::user()->type=='Host')--}}
        <center>

            <p style="font-size: 30px">Want to list your spare space?</p>
            <a>Register Now</a><i class="fa" aria-hidden="true"></i>
            <br>
            <br>
            {{--<div class="input-group" style="width: 250px">--}}

            {{--<input type="text" class="form-control" placeholder="Search for...">--}}
            {{--<span class="input-group-btn">--}}
            {{--<button class="btn btn-secondary" type="button">Go!</button>--}}
            {{--</span>--}}
            {{--</div>--}}
        </center>
        {{--@endif--}}
        <br>

        <hr width="50%">
        <br>
        <br>

        <center>
            <p style="font-size: 30px">Our Featured Listings</p>

        </center>
        <div class="card-deck">
            <div class="row">
                @foreach($properties as $property)
                    @if($property->status=='active')
                        @foreach($images as $image)
                            @if($property->id==$image->house_id )
                                <div class="col-md-4" style="margin-top: 25px">
                                    <div class="card">
                                        <a style="text-decoration: none;color:black;" href="/listing/{{$property->id}}">
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

            @endif

            @endforeach
        </div>
        <br>
        <br>
        <br>
        <div class="row">

        </div>

    </div>


    </div>

@endsection
