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
        <div class="row">
            <div class="card-deck">
                <div class="row">
                    @for ($i=1;$i<=5;$i++)
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="img/houseDefault.png" alt="Card image cap">
                                <div class="card-block">

                                    <p class="card-text">Fully furnished Home Margalla Rawalpindi
                                        <br>
                                        Rs.500

                                    </p>
                                </div>
                                <div class="card-footer">

                                    <center>

                                        <small style="display: inline;" class="text-muted">Stay </small></center>
                                </div>
                            </div>
                        </div>
                        @if($i%3==0)
                </div>
                <br>
                <div class="row">
                    @endif
                    @endfor
                </div>

            </div>
        </div>
        @foreach($listings as $listing)
            <h1>{{$listing->id}}</h1>
        @endforeach



    </div>

@endsection
