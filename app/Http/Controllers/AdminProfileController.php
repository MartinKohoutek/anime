<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|max:30|unique:users,username,' . Auth::user()->id,
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'phone' => 'phone:INTERNATIONAL,CZ',
            'address' => 'max:100',
            'photo' => 'image|max:2048'
        ], [
            'phone.phone' => 'Valid Phone Number Required',
        ]);

        toastr()->success('User Profile Updated Successfully!');

        return redirect()->back();
    }
}
