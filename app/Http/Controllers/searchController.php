<?php

namespace App\Http\Controllers;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use App\submitListing;
use App\house_images;

use Illuminate\Http\Request;

class searchController extends Controller
{
    public function index(Request $string){
//    echo $string->string;
//        $listings=submitListing::find('city', 'Kamra');
        $listings = submitListing::whereCity($string->string)->get();
        $images=   house_images::all();

        Mapper::map(30.375321,69.345116,['marker'=>false,'zoom' => 5]);
        foreach ($listings as $listing){
            $id="/listing/".$listing->id;
            Mapper::informationWindow($listing->lat,$listing->long, "<a href='$id'>".$listing->price."</a>", ['open' => true]);
        }
        return view('search',compact('listings','images'));
        Mapper::render();
//        foreach ($listings as $listing) {
//            return $listing->id;
//        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(Request $request){
//        return $request->location;
        if($request->location!=null){
        $listings = submitListing::whereCity($request->location)
            ->where("listingType",$request->type)
            ->get();
            //$listings = submitListing::where('city$',$request->location);
        $images=   house_images::all();

        Mapper::map(30.375321,69.345116,['marker'=>false,'zoom' => 5]);
//        Mapper::map(30.375321,69.345116,['marker'=>false,'zoom' => 5])->setKey('AIzaSyD8cMWUk-plcymD9_xSx3yPupUoPyyLl-4');
        foreach ($listings as $listing){
            $id="/listing/".$listing->id;
            Mapper::informationWindow($listing->lat,$listing->long, "<a href='$id'>".$listing->price."</a>", ['open' => true]);
        }
        return view('search',compact('listings','images'));
        Mapper::render();}
        else{echo "<script>alert('Please enter some text');</script>";
            $properties=submitListing::all();
            $images=house_images::all();
        return view('home', compact('properties','images'));
        }
    }
}
