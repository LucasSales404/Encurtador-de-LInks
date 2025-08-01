<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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
    public function index()
    {
        $user = Auth::user();
        if (Auth::user()) {
            $name = $user->name;
            $parts = explode(' ', $name);
            $firstName = $parts[0] ?? '';
            $lastName = $parts[1] ?? '';
            $fullName = trim($firstName . ' ' . $lastName);
            return view('index', compact('user', 'fullName'));
        }
        return view('index');
    }


    public function edit(Request $request): View
    {
        $user = Auth::user();
        $name = $user->name;
        $parts = explode(' ', $name);
        $firstName = $parts[0] ?? '';
        $lastName = $parts[1] ?? '';
        $fullName = trim($firstName . ' ' . $lastName);
        return view('profile.edit', compact('user', 'fullName'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

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
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
