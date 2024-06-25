<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Book;
use App\Models\FBooks;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return view('profile.index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function edit(Request $request)
    {
        return view('profile.update', ['user' => $request->user()]);
    }

    public function favorites(Request $request)
    {

        $favbooks = Book::whereIn('id', FBooks::where('user_id', $request->user()->id)->pluck('book_id'))->get();

        return view('profile.fav', ['favbooks' => $favbooks ]);
    }

    public function update()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')
            ],
            'old_password' => ['required'],
            'new_password' => ['required', 'min:6', 'max:255'],

        ]);

        if (!Hash::check(request('old_password'), auth()->user()->password)) {
            return back()->with('error', 'كلمة السر القديمة غير صحيحة!');
        }

        User::where('id', auth()->user()->id)->update(
            [
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('new_password'))
            ]
        );
        return redirect('/home');
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
