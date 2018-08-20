@extends('layouts.app')


<form enctype="multipart/form-data" id="submit-listing" action="{{ route('saveEditListing') }}" method="POST">

    @section('content')
        <div class="container">

            @if(Session::has('info'))

                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                    {{ Session::get('info') }}
                </div>
            @endif

            <div class="row">
                {{ csrf_field() }}

                <div class="col-md-8">
                    <div class="row">
                        <h1>Edit Listing</h1>


                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('listingType') ? ' has-error' : '' }}">
                                <label for="listingType" class="col-md-2 control-label">Listing Type</label>

                                <div class="col-md-9">
                                    @if($listingID->listingType=='Stay')
                                        <label class="radio-inline"><input onclick="myFunction()" type="radio"
                                                                           name="listingType" listingTypeRadio id="stay"
                                                                           value="Stay"
                                                                           checked="checked">Stay</label>
                                        <label class="radio-inline"><input onclick="myFunction()" type="radio"
                                                                           name="listingType" class="listingTypeRadio"
                                                                           id="park"
                                                                           value="Parking">Parking</label>
                                    @elseif($listingID->listingType=='Parking')
                                        <label class="radio-inline"><input onclick="myFunction()" type="radio"
                                                                           name="listingType" listingTypeRadio id="stay"
                                                                           value="Stay"
                                            >Stay</label>
                                        <label class="radio-inline"><input onclick="myFunction()" type="radio"
                                                                           name="listingType" class="listingTypeRadio"
                                                                           id="park"
                                                                           value="Parking"
                                                                           checked="checked">Parking</label>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Name</label>

                                <div class="col-md-9">
                                    <input required id="name" type="text" class="form-control" name="name"
                                           value="{{$listingID->name }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>

                    </div>
                    <div class="row price">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-2 control-label">Price</label>

                                <div class="col-md-9">
                                    <input required id="price" type="number" min="0" class="form-control" name="price"
                                           value="{{$listingID->price}}">

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>

                    </div>
                    <div class="row address">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-2 control-label">Address</label>

                                <div class="col-md-9">
                                    <input disabled="true" required id="address" type="text" class="form-control" name="address"
                                           value="{{ $listingID->address }}">
                                    {{--ye krna h sahi--}}
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                    {{--address end--}}
                    <div class="row city">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-2 control-label">City</label>

                                <div class="col-md-9">
                                    <input required id="city" type="text" class="form-control" name="city"
                                           value="{{ $listingID->city }}">

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                    {{--city end--}}
                    <div class="row phone">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-2 control-label">Contact Number</label>

                                <div class="col-md-9">
                                    <input required id="phone" type="text" class="form-control" name="phone"
                                           value={{ $listingID->phone}}>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                    {{--contact number end--}}


                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">

                            {{--<h3>Select Location</h3>--}}

                            <div style="">
                                {{--{!! Mapper::render() !!}--}}
                                <div id="mapCanvas" style=" width: 100%; height: 200px; float: left;"></div>
                                <div id="infoPanel" style="display: none">
                                    {{--<b> Marker status:</b>--}}
                                    <div style="display: none;" id="markerStatus"><i>Click and drag the marker.</i>
                                    </div>

                                    {{--<input type="hidden" id="address">--}}

                                    <input type="hidden" value="{{$listingID->id}}" name="id" id="id">
                                    <input type="hidden" value="{{$listingID->lat}}" name="lat" id="infoLat">
                                    <input type="hidden" name="status" value="active" id="status">

                                    <input type="hidden" value="{{$listingID->long}}" name="long" id="infoLong">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row ">

                <div class="col-md-8">
                    <div class="row propertyType">

                        <div class="col-md-12">

                            <div class="form-group{{ $errors->has('propertyType') ? ' has-error' : '' }}">
                                <label for="propertyType" class="col-md-2 control-label">Property Type</label>

                                <div class="col-md-9">
                                    {{--<input id="propertyType" type="text" class="form-control" name="propertyType"--}}
                                    {{--value="{{ old('propertyType') }}">--}}
                                    <select class="form-control" id="propertyType" name="propertyType">
                                        <option>House</option>
                                        <option>Appartment</option>
                                        <option>Bungalow</option>
                                        <option>House</option>
                                        <option>Villa</option>
                                    </select>

                                    @if ($errors->has('propertyType'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('propertyType') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>

                        </div>

                    </div>

                    {{--<div class="row images">--}}

                    {{--<div class="col-md-12">--}}

                    {{--<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">--}}
                    {{--<label for="file" class="col-md-2 control-label">Image</label>--}}

                    {{--<div class="col-md-6">--}}
                    {{--<input multiple id="file[]" type="file" name="file[]" value="{{ old('') }}" required--}}
                    {{--autofocus>--}}

                    {{--@if ($errors->has('file[]'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('file[]') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--<br>--}}
                    {{--<br>--}}

                    {{--</div>--}}

                    {{--</div>--}}
                    <div class="row rooms">
                        <div class="col-md-12">


                            <div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
                                <label for="rooms" class="col-md-2 control-label">Rooms</label>

                                <div class="col-md-9">
                                    <input id="rooms" type="number" min="1" class="form-control" name="rooms"
                                           value="{{$listingID->rooms }}">

                                    @if ($errors->has('rooms'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('rooms') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>

                        </div>

                    </div>
                    <div class="row baths">
                        <div class="col-md-12">

                            <div class="form-group{{ $errors->has('baths') ? ' has-error' : '' }}">
                                <label for="baths" class="col-md-2 control-label">Baths</label>

                                <div class="col-md-9">
                                    <input id="baths" type="number" min="0" class="form-control" name="baths"
                                           value="{{$listingID->baths }}">

                                    @if ($errors->has('baths'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('baths') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>


                        </div>

                    </div>

                    @if($listingID->kitchen=='yes')
                        <div class="row kitchen">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('kitchen') ? ' has-error' : '' }}">
                                    <label for="kitchen" class="col-md-2 control-label">Kitchen</label>

                                    <div class="col-md-9">
                                        <label class="radio-inline"><input type="radio" name="kitchen" value="yes"
                                                                           checked="checked">Yes</label>
                                        <label class="radio-inline"><input type="radio" name="kitchen"
                                                                           value="No">No</label>

                                        @if ($errors->has('kitchen'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('kitchen') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>

                            </div>

                        </div>

                    @elseif($listingID->kitchen=='no')
                        <div class="row kitchen">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('kitchen') ? ' has-error' : '' }}">
                                    <label for="kitchen" class="col-md-2 control-label">Kitchen</label>

                                    <div class="col-md-9">
                                        <label class="radio-inline"><input type="radio" name="kitchen" value="yes"
                                            >Yes</label>
                                        <label class="radio-inline"><input type="radio" checked="checked" name="kitchen"
                                                                           value="No">No</label>

                                        @if ($errors->has('kitchen'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('kitchen') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>

                            </div>

                        </div>
                    @endif

                    @if($listingID->kitchen=='yes')
                        <div class="row wifi">
                            <div class="col-md-12">

                                <div class="form-group{{ $errors->has('wifi') ? ' has-error' : '' }}">
                                    <label for="wifi" class="col-md-2 control-label">Wifi</label>

                                    <div class="col-md-9">
                                        <label class="radio-inline"><input type="radio" name="wifi" value="yes"
                                                                           checked="checked">Yes</label>
                                        <label class="radio-inline"><input type="radio" name="wifi"
                                                                           value="No">No</label>
                                        @if ($errors->has('wifi'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('wifi') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    @elseif($listingID->kitchen=='no')
                        <div class="row wifi">
                            <div class="col-md-12">

                                <div class="form-group{{ $errors->has('wifi') ? ' has-error' : '' }}">
                                    <label for="wifi" class="col-md-2 control-label">Wifi</label>

                                    <div class="col-md-9">
                                        <label class="radio-inline"><input type="radio" name="wifi"
                                                                           value="yes">Yes</label>
                                        <label class="radio-inline"><input type="radio" checked="checked" name="wifi"
                                                                           value="No">No</label>
                                        @if ($errors->has('wifi'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('wifi') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                        </div>
                    @endif

                    @if($listingID->iron=='yes')
                    <div class="row iron">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('iron') ? ' has-error' : '' }}">
                                <label for="iron" class="col-md-2 control-label">Iron</label>

                                <div class="col-md-9">
                                    <label class="radio-inline"><input type="radio" name="iron" value="yes"
                                                                       checked="checked">Yes</label>
                                    <label class="radio-inline"><input type="radio" name="iron" value="No">No</label>

                                    @if ($errors->has('iron'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('iron') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                        @elseif($listingID->iron=='no')
                    <div class="row iron">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('iron') ? ' has-error' : '' }}">
                                <label for="iron" class="col-md-2 control-label">Iron</label>

                                <div class="col-md-9">
                                    <label class="radio-inline"><input type="radio" name="iron" value="yes"
                                                                       >Yes</label>
                                    <label class="radio-inline"><input type="radio" checked="checked" name="iron" value="No">No</label>

                                    @if ($errors->has('iron'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('iron') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                    @endif


                    @if($listingID->parking=='yes')
                    <div class="row parking">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('parking') ? ' has-error' : '' }}">
                                <label for="parking" class="col-md-2 control-label">Parking</label>

                                <div class="col-md-9">
                                    <label class="radio-inline"><input type="radio" name="parking" value="yes"
                                                                       checked="checked">Yes</label>
                                    <label class="radio-inline"><input type="radio" name="parking" value="No">No</label>

                                    @if ($errors->has('parking'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('parking') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>

                    </div>
@elseif($listingID->parking=='no')
                    <div class="row parking">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('parking') ? ' has-error' : '' }}">
                                <label for="parking" class="col-md-2 control-label">Parking</label>

                                <div class="col-md-9">
                                    <label class="radio-inline"><input type="radio" name="parking" value="yes"
                                                                       >Yes</label>
                                    <label class="radio-inline"><input type="radio" checked="checked" name="parking" value="No">No</label>

                                    @if ($errors->has('parking'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('parking') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                    @endif

                    <div class="row additionalDescription">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('additionalDescription') ? ' has-error' : '' }}">
                                <label for="additionalDescription" class="col-md-2 control-label">Additional
                                    Description</label>

                                <div class="col-md-9">
                                <textarea rows="3" id="additionalDescription" type="text" class="form-control"
                                          name="additionalDescription" value="{{$listingID->additionalDescription }}">
                                </textarea>
                                    @if ($errors->has('additionalDescription'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('additionalDescription') }}</strong>
                                    </span>
                                    @endif
                                    <br>
                                    <div class="form-group" style="float: right;">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>


                        </div>

                    </div>


                </div>
            </div>
</form>
<?php


?>
<script>
    function myFunction() {
//         alert("ok");
//     }
//     if (document.getElementById('listingTypeRadio').checked) {
//         rate_value = document.getElementById('listingTypeRadio').value;
//         alert("ok");
//     }
        var selectedOption = $("input:radio[name=listingType]:checked").val();
        if (document.querySelector('input[name=listingType][checked]')) {
//            alert('done');
            if (selectedOption == 'Stay') {

                $('.propertyType').show();
                $('.rooms').show();
                $('.baths').show();
                $('.kitchen').show();
                $('.iron').show();
                $('.parking').show();
                $('.wifi').show();
                $('.additionalDescription').show();

            }
            else if (selectedOption == 'Parking') {

                $('.propertyType').hide();
                $('.rooms').hide();
                $('.baths').hide();
                $('.kitchen').hide();
                $('.iron').hide();
                $('.parking').hide();
                $('.wifi').hide();
            }
        }
    }
</script>

<script type="text/javascript">


    var geocoder = new google.maps.Geocoder();

    function geocodePosition(pos) {
        geocoder.geocode({
            latLng: pos
        }, function (responses) {
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
        document.getElementById('infoLat').value = [latLng.lat()];
        document.getElementById('infoLong').value = [latLng.lng()]
    }

    function updateMarkerAddress(str) {
        document.getElementById('address').value = str;
    }

    function initialize() {
//        alert(document.getElementById("infoLat").value);
//        alert(document.getElementById("infoLong").value);
//        $("input:text[name=lat]").val();
//        var latLng = new google.maps.LatLng(33.7660, 72.3609);
        var latLng = new google.maps.LatLng(document.getElementById("infoLat").value, document.getElementById("infoLong").value);
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
        google.maps.event.addListener(marker, 'dragstart', function () {
            updateMarkerAddress('Dragging...');
        });

        google.maps.event.addListener(marker, 'drag', function () {
            updateMarkerStatus('Dragging...');
            updateMarkerPosition(marker.getPosition());
        });

        google.maps.event.addListener(marker, 'dragend', function () {
            updateMarkerStatus('Drag ended');
            geocodePosition(marker.getPosition());
        });
    }

    // Onload handler to fire off the app.
    google.maps.event.addDomListener(window, 'load', initialize);

</script>

@endsection