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
            <div class="search">
                <div class="container">
                    <div class="row">
                        <div class="ol-md-offset-2 col-md-8 col-md-offset-2">
                            <div class="form-section">
                                <div class="row">
                                    {{--<form role="form">--}}
                                    {{--<form enctype="multipart/form-data" id="submit-listing" action="{{ route('search') }}" method="POST">--}}
                                    <form  method="POST" action="{{ route('search') }}">
                                        {{ csrf_field() }}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="location">Location</label>
                                                <input type="text" class="form-control" id="location" placeholder="Location" name="location">
                                            </div>
                                        </div>
                                        {{--<div class="col-md-1">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label class="sr-only" for="checkin">Check in</label>--}}
                                                {{--<div class="input-group">--}}
                                                    {{--<input type="text" class="form-control" id="checkin" placeholder="Check in">--}}
                                                    {{--<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                            {{--<div class="col-md-1">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label class="sr-only" for="checkout">Check out</label>--}}
                                                    {{--<div class="input-group">--}}
                                                        {{--<input type="text" class="form-control" id="checkout" placeholder="Check out">--}}
                                                        {{--<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="sr-only" for="guest"></label>
                                                <select id="guest" name="type" class="form-control">
                                                    <option value="Stay">Stay</option>
                                                    <option value="Parking">Parking</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-default btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <br>


            <center><h1>Our Featured Places</h1></center>
            <br>
        </div>

        <div class="row" >
            <div class="card-deck">
              <div class="card">
                  <a style="text-decoration: none;color:black;display: inline" href="/search/karachi">

                      <img class="card-img-top" src="img/mazareQuaid.jpg" alt="Card image cap">
                    <div class="card-block">
                        <center><h4 class="card-title">Karachi</h4></center>
                    </div>
                  </a>
                </div>


                <div class="card">
                    <a style="text-decoration: none;color:black;display: inline" href="/search/islamabad">

                    <img class="card-img-top" src="img/faisalMasjid.gif" alt="Card image cap">
                    <div class="card-block">
                        <center><h4 class="card-title">Islamabad</h4></center>
                    </div>
                    </a>
                </div>


                <div class="card">
                    <a style="text-decoration: none;color:black;display: inline" href="/search/lahore">

                    <img class="card-img-top" src="img/minarePakistan.jpg" alt="Card image cap">
                    <div class="card-block">
                        <center><h4 class="card-title">Lahore</h4></center>

                    </div>
                    </a>

                </div>
            </div>
            <br>
            <br>
            <div class="card-deck">
              <div class="card">
                  <a style="text-decoration: none;color:black;display: inline" href="/search/peshawar">

                      <img class="card-img-top" src="img/peshawar.jpg" alt="Card image cap">
                    <div class="card-block">
                        <center><h4 class="card-title">Peshawar</h4></center>
                    </div>
                  </a>
                </div>


                <div class="card">
                    <a style="text-decoration: none;color:black;display: inline" href="/search/faisalabad">

                    <img class="card-img-top" src="img/faisalabad.jpg" alt="Card image cap">
                    <div class="card-block">
                        <center><h4 class="card-title">Faisalabad</h4></center>
                    </div>
                    </a>
                </div>


                <div class="card">
                    <a style="text-decoration: none;color:black;display: inline" href="/search/quetta">

                    <img class="card-img-top" src="img/quetta.jpg" alt="Card image cap">
                    <div class="card-block">
                        <center><h4 class="card-title">Quetta</h4></center>

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
            <a class="btn btn-primary" href="{{ route('submitlisting') }}">Submit Your Space</a>
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
<script>
    $(window).ready(function(){
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        var checkin = $('#checkin').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('#checkout')[0].focus();
        }).data('datepicker');
        var checkout = $('#checkout').datepicker({
            onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            checkout.hide();
        }).data('datepicker');
    });
</script>