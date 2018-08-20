<?php

namespace App\Http\Controllers;

use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use App\submitListing;
use App\house_images;

class mapController extends Controller
{
    public function index()
    {
        Mapper::map(33.7669097, 72.8232996, ['marker' => false]);
        Mapper::informationWindow(34.7669097, 72.8232996, '$20', ['open' => true]);
        Mapper::informationWindow(34.5669097, 72.8232996, '$20', ['open' => true]);
        Mapper::informationWindow(34.7669097, 73.8111, '$20', ['open' => true]);
        Mapper::informationWindow(35.7669097, 73.5111, '$20', ['open' => true]);
        Mapper::informationWindow(35.7669097, 74.8111, '$20', ['open' => true]);
        return view('home2');
        Mapper::render();
    }

    public function test()
    {
        $properties = submitListing::all();
        $images = house_images::all();
        return view('test',compact('properties','images'));
    }
}
