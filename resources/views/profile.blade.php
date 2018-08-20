@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-10 col-md-offset-1">
                <img src="/img/{{Auth::user()->avatar}}"
                     style="width:150px;height:150px;float: left;border-radius: 50%;margin-right: 25px">
                <h1>{{Auth::user()->name}}'s Profile</h1>
                <h3>You are currently registered as {{Auth::user()->type}}</h3>
                {{--@if(Auth::user()->type!='Host')--}}
                    {{--<a class="btn btn-primary" href="{{ route('submitlisting') }}">Become Host</a>--}}
                {{--@endif--}}


                {{--<form enctype="multipart/form-data" action="/profileImage" method="POST">--}}
                {{--<label>Update Profile Image</label>--}}
                {{--<input type="file" name="avatar">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                {{--<input type="submit" class="pull-right btn btn-sm btn-primary">--}}
                {{--</form>--}}
                {{--<form enctype="multipart/form-data" action="/profileImage" method="post">--}}
                {{--<label>Update Profile Image</label>--}}
                {{--<input type="file" name="avatar">--}}
                {{--<input type="hidden" name="token" value="{{csrf_token()}}">--}}
                {{--<input type="submit" class="pull-right btn btn-sm btn-primary">--}}
                {{--</form>--}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col col-md-10 col-md-offset-1">

                <h3>Add New New Listing</h3>

                <a class="btn btn-primary" href="{{ route('submitlisting') }}">Add New</a>
            </div>

        </div>
        {{--@if(Auth::user()->type=='Host')--}}

            <div class="row">
                <div class="col col-md-10 col-md-offset-1">
                    <h3>Your Submitted Listings ({{$listings->where('userEmail', Auth::user()->email )->count()}})</h3>

                    @foreach($listings as $listing)
                        @if($listings->where('userEmail', Auth::user()->email ))
                            <div class="row well">
                                <div class="col col-md-10 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            $x = false;
                                            ?>
                                            @foreach($images as $image)
                                                @if($listing->id==$image->house_id)
                                                    @if($x==false)
                                                        <img style="height: 200px" class="img-responsive img-rounded"
                                                             src="{{$image->path}}">
                                                    @endif
                                                    <?php
                                                    $x = true;
                                                    ?>
                                                @endif

                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Name: {{$listing->name}}</h4>
                                            <h5>Price: Rs.{{$listing->price}}</h5>
                                            <h5>Address: {{$listing->address}}</h5>
                                            <h5>Status: {{$listing->status}}</h5>

                                        </div>

                                    </div>
                                </div>
                                <div class="col col-md-2">

                                    <div class="button" style="display: inline">
                                        @if($listing->status=='active')
                                            <form enctype="multipart/form-data" action="{{ route('pauseListing') }}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="POST">
                                                <input type="hidden" name="listingID" value="{{$listing->id}}">
                                                <button type="submit" class="btn btn-primary">Pause&nbsp;&nbsp;&nbsp;
                                                </button>
                                            </form>
                                        @elseif($listing->status==='paused')
                                            <form enctype="multipart/form-data"
                                                  action="{{ route('activateListing') }}"
                                                  method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="POST">
                                                <input type="hidden" name="listingID" value="{{$listing->id}}">
                                                <button class="btn btn-success">Activate</button>
                                            </form>
                                        @endif
                                        <form enctype="multipart/form-data"
                                              action="{{ route('deleteListing') }}"
                                              method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="POST">
                                            <input type="hidden" name="listingID" value="{{$listing->id}}">
                                            <button class="btn btn-danger">Delete&nbsp;&nbsp;&nbsp;</button>
                                        </form>
                                        <form enctype="multipart/form-data"
                                              action="{{ route('editListing') }}"
                                              method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="POST">
                                            <input type="hidden" name="listingID" value="{{$listing->id}}">
                                            <button class="btn btn-warning">Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>


            </div>
        {{--@endif--}}

    </div>
@endsection;