<?php

namespace App\Http\Controllers;
use App\house_images;
use App\submitListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $properties=submitListing::all();
        $images=house_images::all();
        return view('home',compact('properties','images'));
    }
}
