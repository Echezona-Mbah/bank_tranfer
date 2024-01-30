<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateProfileController extends Controller
{
    public function updateProfile()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        return view('user.update_profile', compact('user','currencies'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'account_type' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'Nationality' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'next_kin_relation' => 'required|string|max:255',
            'next_kin_address' => 'required|string|max:255',
        ]);
    
        try {
            $user->update([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'account_type' => $request->input('account_type'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'address' => $request->input('address'),
                'Nationality' => $request->input('Nationality'),
                'gender' => $request->input('gender'),
                'next_kin_relation' => $request->input('next_kin_relation'),
                'next_kin_address' => $request->input('next_kin_address'),
                'status' => 'confirmed',
            ]);
    
            Alert::success('Success', 'Profile updated successfully.')->showConfirmButton('OK');
        } catch (\Exception $e) {

            Alert::error('Error', 'Something went wrong. Please try again.')->showConfirmButton('OK');
        }
    
        return redirect()->back();
    }


    public function photo()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        return view('user.photo', compact('user','currencies'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'profileImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($user->profile_image) {
            $previousImagePath = public_path('uploads/profiles/' . $user->profile_image);
            if (File::exists($previousImagePath)) {
                File::delete($previousImagePath);
            }
        }

        $imageName = time() . '.' . $request->profileImage->extension();
        $request->profileImage->move(public_path('uploads/profiles'), $imageName);

        // Update user's profile image
        $user->update(['profile_image' => $imageName]);

        Alert::success('Success', 'Profile image uploaded  successfully.')->showConfirmButton('OK');

        return redirect()->back();
    }

    public function deleteImage(Request $request)
    {
        $user = Auth::user();

        if ($user->profile_image) {
            $imagePath = public_path('uploads/profiles/' . $user->profile_image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $user->update(['profile_image' => null]);

            Alert::success('Success', 'Profile image deleted  successfully.')->showConfirmButton('OK');

            return redirect()->back();

        }

        Alert::error('error', 'No profile image to delete.')->showConfirmButton('OK');

        return redirect()->back();

    }


}
