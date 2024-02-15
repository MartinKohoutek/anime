<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;


class UserProfileController extends Controller
{
    use ImageUploadTrait;

    public function index(): View
    {
        return view('frontend.profile.index');
    }

    public function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $imgName = $this->updateImage($request, 'photo', 'upload/users', $user->photo);

        $user->photo = $imgName;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        toastr()->success('User Profile Updated Successfully!');

        return redirect()->back();
    }
}
