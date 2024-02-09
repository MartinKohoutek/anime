<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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

        $user = User::find(Auth::user()->id);

        if ($request->hasFile('photo')) {
            if (File::exists(public_path($user->photo))) {
                File::delete(public_path($user->photo));
            }
            $img = $request->file('photo');
            $imgName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('upload/users'), $imgName);
            $path = '/upload/users/' . $imgName;
            $user->photo = $path;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        toastr()->success('User Profile Updated Successfully!');

        return redirect()->back();
    }

    public function profilePassword()
    {
        return view('admin.profile.password');
    }

    public function profilePasswordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);

        $request->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        toastr()->success('Password Changed Successfully!');

        return redirect()->back();
    }
}
