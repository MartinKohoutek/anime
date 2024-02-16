<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function changePassword()
    {
        return view('frontend.profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        toastr()->success('Password Changed Successfully!');

        return redirect()->back();
    }
}
