<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Scribbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the account page.
     */
    public function index(): Renderable
    {
        // Return account page with authenticated user.
        return view('app.account', ['user' => Auth::user()]);
    }

    /**
     * Update the authenticated users' email.
     */
    public function updateEmail(Request $request)
    {
        // Make sure the email is valid.
        $request->validate([
            'email' => 'required|email|string|max:255',
        ]);

        // Get the authenticated user and update their email.
        $user = Auth::user();

        $user->email = $request->email;
        $user->save();

        // Redirect to account page after success.
        return redirect()
            ->route('app.account', ['user' => $user])
            ->with('success', 'Email updated successfully.');
    }

    /**
     * Delete the user and their Scribbls from the system.
     */
    public function delete(Request $request)
    {
        $user = Auth::user();

        // This isn't the cleanest method, but it works for now.
        Scribbl::where('owner', '=', $user->id)->delete();

        // Delete the user model from the system.
        $user->delete();

        // Redirect to index page after success.
        return redirect()->route('index');
    }
}
