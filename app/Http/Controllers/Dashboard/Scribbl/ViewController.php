<?php

namespace App\Http\Controllers\Dashboard\Scribbl;

use App\Models\Scribbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;

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

    public function view(Request $request): Renderable
    {
        // Get the requested Scribbl.
        $scribbl = Scribbl::find($request['id']);

        // If the Scribbl is marked as public,
        // we can just return the view straight
        // away.
        if ($scribbl->public) {
            return view('app.view', ['scribbl' => $scribbl]);
        }

        // If the user is not the Scribbl owner,
        // and the Scribbl is private, we need
        // to redirect to the unauthorised page.
        if (Auth::user()->id != $scribbl->owner) {
            // Return unauthorised page.
            return view('app.unauthorised')->with('error', 'Unable to view Scribbl: Marked as private.');
        } else {
            // Return view page with authenticated user and the requested Scribbl.
            return view('app.view', ['scribbl' => $scribbl]);
        };
    }

    public function info(Request $request): Renderable
    {
        // Get the requested Scribbl.
        $scribbl = Scribbl::find($request['id']);

        // If the Scribbl is marked as public,
        // we can just return the view straight
        // away.
        if ($scribbl->public) {
            return view('app.info', ['scribbl' => $scribbl]);
        }

        // If the user is not the Scribbl owner,
        // and the Scribbl is private, we need
        // to redirect to the unauthorised page.
        if (Auth::user()->id != $scribbl->owner) {
            // Return unauthorised page.
            return view('app.unauthorised')->with('Unable to view Scribbl: Marked as private.');
        } else {
            // Return info page with authenticated user and the requested Scribbl.
            return view('app.info', ['scribbl' => $scribbl]);
        };
    }

    /**
     * Show the create page for Scribbls.
     */
    public function create(): Renderable
    {
        // Return creation page.
        return view('app.create');
    }

    /**
     * Show the edit page for Scribbls.
     */
    public function edit(Request $request): Renderable
    {
        // Get the requested Scribbl.
        $scribbl = Scribbl::find($request['id']);

        // Get the authenticated user.
        $user = Auth::user()->id;

        // If the user is not the Scribbl owner,
        // and the Scribbl is private, we need
        // to redirect to the unauthorised page.
        if (Auth::user()->id != $scribbl->owner) {
            // Return unauthorised page.
            return view('app.unauthorised')->with('error', 'Unable to edit Scribbl: User does not own this Scribbl.');
        } else {
            // Return edit page with the requested Scribbl.
            return view('app.edit', ['scribbl' => $scribbl]);
        };
    }
}
