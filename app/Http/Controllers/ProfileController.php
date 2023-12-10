<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\UploadFileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(protected UploadFileService $fileService) {}

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
        $request->validated();

        $request->user()->fill(
            $request->safe()->only(['name', 'email']) +
            [
                'avatar' => $request->hasFile('avatar') ? $this->fileService->update($request->file('avatar'), $request->user()->avatar,'images/users') : $request->user()->avatar,
                'password' => !empty($request->input('password')) ? Hash::make($request->input('password')) : $request->user()->password
            ]
        );

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', trans('message.update'));
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
