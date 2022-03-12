<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
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
        $user = Auth::user();

        return view('app.account', ['user' => $user]);
    }

    /**
     * Update the authenticated users' email.
     */
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|max:255',
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return redirect()->route('app.account', ['user' => $user]);
    }
}
