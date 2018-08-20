@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Session::has('info'))

            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('info') }}
            </div>
        @endif
        <h1>Submit Listing</h1>


            <form enctype="multipart/form-data" id="submit-listing" action="{{ route('submitPost') }}" method="POST">
                {{ csrf_field() }}
                {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                    {{--<label for="name" class="col-md-2 control-label">Name</label>--}}

                    {{--<div class="col-md-6">--}}
                        {{--<input id="name" type="radio" class="form-control" name="listingType" value="" >--}}

                        {{--@if ($errors->has('listingType'))--}}
                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('listingType') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group{{ $errors->has('listingType') ? ' has-error' : '' }}">
                    <label for="listingType" class="col-md-2 control-label">Listing Type</label>

                    <div class="col-md-6">
                        <label class="radio-inline"><input type="radio" name="listingType" value="Stay" checked="checked">Stay</label>
                        <label class="radio-inline"><input type="radio" name="listingType" value="Parking">Parking</label>

                    </div>
                </div>
                <br>
                <br>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                {{--'listingType','name','price','address','lat','long','propertyType','rooms','baths','kitchen','wifi','iron','parking','additionalDescription'--}}
                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    <label for="price" class="col-md-2 control-label">Price</label>

                    <div class="col-md-6">
                        <input id="price" type="number" min="0" class="form-control" name="price" value="{{ old('price') }}" >

                        @if ($errors->has('price'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-md-2 control-label">Address</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control" name="Address" value="{{ old('address') }}" >

                        @if ($errors->has('address'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>


                </div>

                <input type="hidden" name="lat" id="infoLat" >
                <input type="hidden" name="long" id="infoLong">
                <br>
                <br>

                <br>
                <br>
                <div class="form-group{{ $errors->has('propertyType') ? ' has-error' : '' }}">
                    <label for="propertyType" class="col-md-2 control-label">Property Type</label>

                    <div class="col-md-6">
                        <input id="propertyType" type="text" class="form-control" name="propertyType" value="{{ old('propertyType') }}" >

                        @if ($errors->has('propertyType'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('propertyType') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
                    <label for="rooms" class="col-md-2 control-label">Rooms</label>

                    <div class="col-md-6">
                        <input id="rooms" type="number" min="1" class="form-control" name="rooms" value="{{ old('rooms') }}" >

                        @if ($errors->has('rooms'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('rooms') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group{{ $errors->has('baths') ? ' has-error' : '' }}">
                    <label for="baths" class="col-md-2 control-label">Baths</label>

                    <div class="col-md-6">
                        <input id="baths" type="number"  min="0"  class="form-control" name="Baths" value="{{ old('baths') }}" >

                        @if ($errors->has('baths'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('baths') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group{{ $errors->has('kitchen') ? ' has-error' : '' }}">
                    <label for="kitchen" class="col-md-2 control-label">Kitchen</label>

                    <div class="col-md-6">
                        <input id="rooms" type="text" class="form-control" name="Kitchen" value="{{ old('kitchen') }}" >

                        @if ($errors->has('kitchen'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('kitchen') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group{{ $errors->has('wifi') ? ' has-error' : '' }}">
                    <label for="wifi" class="col-md-2 control-label">Wifi</label>

                    <div class="col-md-6">
                        <input id="wifi" type="text" class="form-control" name="wifi" value="{{ old('wifi') }}" >

                        @if ($errors->has('wifi'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('wifi') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group{{ $errors->has('iron') ? ' has-error' : '' }}">
                    <label for="iron" class="col-md-2 control-label">Iron</label>

                    <div class="col-md-6">
                        <input id="iron" type="text" class="form-control" name="iron" value="{{ old('iron') }}" >

                        @if ($errors->has('iron'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('iron') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group{{ $errors->has('parking') ? ' has-error' : '' }}">
                    <label for="parking" class="col-md-2 control-label">Parking</label>

                    <div class="col-md-6">
                        <input id="parking" type="text" class="form-control" name="parking" value="{{ old('parking') }}" >

                        @if ($errors->has('parking'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('parking') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group{{ $errors->has('additionalDescription') ? ' has-error' : '' }}">
                    <label for="parking" class="col-md-2 control-label">Additional Description</label>

                    <div class="col-md-6">
                        <input id="additionalDescription" type="text" class="form-control" name="additionalDescription" value="{{ old('additionalDescription') }}" >

                        @if ($errors->has('additionalDescription'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('additionalDescription') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <br>



                <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                    <label for="file" class="col-md-2 control-label">Image</label>

                    <div class="col-md-6">
                        <input multiple id="file[]" type="file"  name="file[]" value="{{ old('') }}" required autofocus>

                        @if ($errors->has('file[]'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('file[]') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <br>
                <br>
                <div class="form-group">
                    <div class="col-md-7"></div>
                    <div class="col-md-3 offset-md-1">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>

            </form>


    </div>
    <script type="text/javascript">
        var geocoder = new google.maps.Geocoder();

        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                if (responses && responses.length > 0) {
                    updateMarkerAddress(responses[0].formatted_address);
                } else {
                    updateMarkerAddress('Cannot determine address at this location.');
                }
            });
        }

        function updateMarkerStatus(str) {
            document.getElementById('markerStatus').innerHTML = str;
        }

        function updateMarkerPosition(latLng) {
            document.getElementById('infoLat').value = [latLng.lat()];
            document.getElementById('infoLong').value = [ latLng.lng()]
        }

        function updateMarkerAddress(str) {
            document.getElementById('address').value = str;
        }

        function initialize() {
            var latLng = new google.maps.LatLng(33.7660, 72.3609);
            map = new google.maps.Map(document.getElementById('mapCanvas'), {
                zoom: 8,
                center: latLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var marker = new google.maps.Marker({
                position: latLng,
                title: 'Point A',
                map: map,
                draggable: true
            });

            // Update current position info.
            updateMarkerPosition(latLng);
            geocodePosition(latLng);

            // Add dragging event listeners.
            google.maps.event.addListener(marker, 'dragstart', function() {
                updateMarkerAddress('Dragging...');
            });

            google.maps.event.addListener(marker, 'drag', function() {
                updateMarkerStatus('Dragging...');
                updateMarkerPosition(marker.getPosition());
            });

            google.maps.event.addListener(marker, 'dragend', function() {
                updateMarkerStatus('Drag ended');
                geocodePosition(marker.getPosition());
            });
        }

        // Onload handler to fire off the app.
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
