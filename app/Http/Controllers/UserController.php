<?php

namespace App\Http\Controllers;

use App\house_images;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\submitListing;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $listings = submitListing::all();
        $user = Auth::user();
        $images = house_images::all();
        return view('profile', compact('user', 'listings', 'images'));

    }
    public function becomeHost(Request $request )
    {
        return "hello";

    }

    public function updateAvatar(Request $request)
    {
//        $this->validate($request,['file'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
//        $image= $request->file('file');
//        $newName=rand().'.'.$image->getClientOriginalExtension();
//        $image->move(public_path("imagea"),$newName);
//            $id=Auth::user()->id;
//            DB::table('users')
//                ->where('id', $id)
//                ->update(['path' => $newName]);
//            return view('home');
//    }
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
//$avatar->save( public_path('/uploads/avatars/' . $filename ) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile');

    }

}
