<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class api_controller extends Controller
{

    function api_controller(Request $request)
    {

        if ($request->app_username != "hamza" && $request->app_password != "password") {

            return \Response()->json(array("message" => "You are not allowed to access this resource  ", "code" => 502), 502);


        }
    }

    public function data()
    {
//        $results = submitListing::all();
        $results = \App\submitListing::select("*")
            ->leftJoin("house_images", "house_images.house_id", "=", "submit_listings.id")
            ->get();
//        $house_images=new \App\house_images::leftJoin("house_images","house_images.house_id","=","");
//        $array=merge_array($results,$house_images);


        return [$results];
//        return $array;
    }

    public function search( $text)
    {
//        $results = \App\submitListing::select("*")
//            ->leftJoin("house_images", "house_images.house_id", "=", "submit_listings.id")
//            ->where("submit_listings.city", "=", $text)
//            ->orWhere("ListingType", "=", $type)
//            ->get();
$results = \App\submitListing::select("*")
            ->leftJoin("house_images", "house_images.house_id", "=", "submit_listings.id")
            ->where("submit_listings.city", "=", $text)
            ->get();

        return [$results];
    }

    public function dataID($id)
    {
//        $results = submitListing::all();
        $results = \App\submitListing::select("*")->leftJoin("house_images", "house_images.house_id", "=", "submit_listings.id")
            ->find($id);

        return [$results];
    }

    public function login(Request $request)
    {


        $result = \App\User::select(["email", "password"])->where("email", "=", $request->email)->first();
        if (password_verify($request->password, $result->password)) {
            return \Response()->json(array("message" => "Password Verified you are logged in ", "code" => 200), 200);
        }
        return \Response()->json(array("message" => "Email / password is wrong", "code" => 503), 503);


    }

    public function register(Request $request)
    {

        $user = new \App\User();
        $response = $user->create($request->all());
        if ($response) {
            return \Response()->json(array("message" => "User created successfully ", "code" => 200), 200);
        }
        return \Response()->json(array("message" => "Something went wrong", "code" => 503), 503);


    }

}
