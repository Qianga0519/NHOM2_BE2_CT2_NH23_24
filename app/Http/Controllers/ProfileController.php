<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Avatar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $request->user()->gender = $request->gender;
        $request->user()->city = $request->city;
        $request->user()->district = $request->district;
        $request->user()->ward = $request->ward;
        $request->user()->address = $request->address;
        $request->user()->fullname = $request->fullname;
        // dd($request->image);
        // $request->user()->city = $request->city;
        // dd($request->city, $request->district, $request->ward);
        if ($request->has('image')) {

            $file = $request->image;
            $file_name = $file->getClientOriginalName();
            $image_url = $file_name;
            $file->move(public_path('images'), $file_name);
            if ($image_url) {
                $user_id = Auth::user()->id;
                $avatar = Avatar::where('user_id', $user_id)->first();
                if ($avatar) {
                    $avatar->delete();
                    Avatar::create(['url' => $image_url, 'user_id' => $user_id]);
                } else {
                    Avatar::create(['url' => $image_url, 'user_id' => $user_id]);
                }
            }
        }
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
