<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
     * Show the application dashboard account page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('app.account', ['user' => $user]);
    }

    /**
     * Update the authenticated users' email.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|max:255',
        ]);

        $u = Auth::user();
        $u->email = $request['email'];
        $u->save();

        return redirect()->route('app.account', ['user' => $u]);
    }
}
