<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;

class UserProfileController extends Controller
{
    public function index(): View
    {
        return view('frontend.profile.index');
    }

    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        toastr()->success('User Profile Updated Successfully!');

        return redirect()->back();
    }
}
