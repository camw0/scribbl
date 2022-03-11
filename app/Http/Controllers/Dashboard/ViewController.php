<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Scribbl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
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
     * Show the view page for Scribbls.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $scribbl = Scribbl::find($request->id);
        $user = Auth::user();

        if (Auth::user()->id !== $scribbl->owner) {
            return view('app.unauthorised');
        } else {
            return view('app.view', ['scribbl' => $scribbl, 'user' => $user]);
        };
    }
}
