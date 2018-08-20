<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;


class submitListing extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('submitlisting');
    }

    public function indexPost(Request $request)
    {
        $images = $request->file('file');
        $submitListing = new \App\submitListing();
        if ($request->listingType == 'Stay') {
            $submitListing->create(
                ['userEmail' => Auth::user()->email,
                    'status' => $request->status,
                    'listingType' => $request->listingType,
                    'name' => $request->name,
                    'price' => $request->price,
                    'address' => $request->address,
                    'lat' => $request->lat,
                    'long' => $request->long,
                    'phone'=>$request->phone,
                    'city'=>$request->city,
                    'propertyType' => $request->propertyType,
                    'rooms' => $request->rooms,
                    'baths' => $request->baths,
                    'kitchen' => $request->kitchen,
                    'wifi' => $request->wifi,
                    'iron' => $request->iron,
                    'parking' => $request->parking,
                    'additionalDescription' => $request->additionalDescription]
            );
            $house_id = app('db')->getPdo()->lastInsertId();
            $house_images = new \App\house_images();
            foreach ($images as $image) {
                $newName = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path("image"), $newName);
                $path = "/image/" . $newName;
                $house_images->create(['path' => $path, "house_id" => $house_id]);
                echo "<script>alert('Submitted');</script>";

            }
            return back();
            exit;
        }
        elseif ($request->listingType == 'Parking')
        {
            $submitListing->create(
                ['userEmail' => Auth::user()->email,
                    'status' => $request->status,
                    'listingType' => $request->listingType,
                    'name' => $request->name, 'price' => $request->price,
                    'address' => $request->address,
                    'phone'=>$request->phone,
                    'city'=>$request->city,
                    'lat' => $request->lat,
                    'long' => $request->long,
                    'additionalDescription' => $request->additionalDescription]
            );
            $house_id = app('db')->getPdo()->lastInsertId();
            $house_images = new \App\house_images();
            foreach ($images as $image) {
                $newName = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path("image"), $newName);
                $path = "/image/" . $newName;
                $house_images->create(['path' => $path, "house_id" => $house_id]);
                echo "<script>alert('Submitted');</script>";

            }
            return back();
            exit;
        }
    }
}
