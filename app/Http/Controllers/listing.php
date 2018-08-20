<?php

namespace App\Http\Controllers;

use App\submitListing;
use App\house_images;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class listing extends Controller
{
    public function index()
    {
        $properties = submitListing::all();
        $images = house_images::all();
        return view('listings', compact('properties', 'images'));
    }

    public function showSingle(submitListing $listing)
    {
        Mapper::map(30.375321,69.345116,['marker'=>false,'zoom' => 5]);
        Mapper::informationWindow($listing->lat,$listing->long, "<a href='$listing->id'>".$listing->price."</a>", ['open' => true]);
//        Mapper::render();
        $images = house_images::all();
//        return $listing->id;
        return view('listing', compact('listing', 'images'));
    }

    public function pauseListing(Request $request)
    {
        $listing = submitListing::find($request->listingID);
        $listing->status = 'paused';
        $listing->save();

        $listings = submitListing::all();
        $user = Auth::user();
        $images = house_images::all();
        return view('profile', compact('user', 'listings', 'images'));

    }

    public function activateListing(Request $request)
    {
        $listing = submitListing::find($request->listingID);
        $listing->status = 'active';
        $listing->save();


        $listings = submitListing::all();
        $user = Auth::user();
        $images = house_images::all();
        return view('profile', compact('user', 'listings', 'images'));

    }

    public function deleteListing(Request $request)
    {
        $affected = house_images::where('house_id', '=', $request->listingID);
        $affected->delete();
//        $count = User::where('votes', '>', 100)->count();

        $listingDelete = submitListing::find($request->listingID);
        $listingDelete->delete();


        $listings = submitListing::all();
        $user = Auth::user();
        $images = house_images::all();
        return view('profile', compact('user', 'listings', 'images'));

    }

    public function editListing(Request $request)
    {

//        $count = User::where('votes', '>', 100)->count();
        $listingID = submitListing::find($request->listingID);
        $listingHouseID = house_images::find($request->listingID);
//        $listings=submitListing::all();
        $user = Auth::user();
//        $images=house_images::all();
        return view('editListing', compact('listingID'));
//        return view('editListing')->with('listingID',$listingID);
//        return $listingHouseID->id;

    }

    public function saveEditListing(Request $request)
    {
        $editListing = submitListing::find($request->id);
//    echo $editListing->name;
        if ($request->listingType == 'Stay') {

            $editListing->listingType = $request->listingType;
            $editListing->name = $request->name;
            $editListing->price = $request->price;
            $editListing->address = $request->address;
            $editListing->phone = $request->phone;
            $editListing->city = $request->city;
            $editListing->propertyType = $request->propertyType;
            $editListing->rooms = $request->rooms;
            $editListing->baths = $request->baths;
            $editListing->kitchen = $request->kitchen;
            $editListing->wifi = $request->wifi;
            $editListing->iron = $request->iron;
            $editListing->parking = $request->parking;
            $editListing->additionalDescription = $request->additionalDescription;
            $editListing->save;


            $listings = submitListing::all();
            $user = Auth::user();
            $images = house_images::all();
            return view("profile", compact('user', 'listings', 'images'));

        } elseif ($request->listingType == 'Parking') {

            $editListing->listingType = $request->listingType;
            $editListing->name = $request->name;
            $editListing->price = $request->price;
            $editListing->address = $request->address;
            $editListing->phone = $request->phone;
            $editListing->city = $request->city;
            $editListing->additionalDescription = $request->additionalDescription;
            $editListing->save;
            echo "<script>alert('Submitted');</script>";

            $listings = submitListing::all();
            $user = Auth::user();
            $images = house_images::all();
            return view("profile", compact('user', 'listings', 'images'));

//        $editListing->
            //        $fligh    t->name = 'New Flight Name';
//
//        $flight->save();
        }
    }
}

