<?php

namespace App\Http\Controllers\Dashboard\Scribbl;

use App\Models\Scribbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;

class ScribblController extends Controller
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
     * Create the Scribbl and update the user's total scribbls.
     */
    public function create(Request $request)
    {
        // Parse the request and see whether
        // the Scribbl is public or not.
        if (!$request['public']) {
            // If it's private,
            // set to 'false'
            $p = 0;
        } else {
            // If it's public,
            // set to 'true'
            $p = 1;
        }

        // Create a Scribbl using the model
        // and save it to the database.
        $s = Scribbl::create([
            'owner' => Auth::user()->id,
            'title' => $request['title'],
            'description' => $request['description'],
            'public' => $p,
        ]);
        $s->save();

        // Update the user's total Scribbl count.
        $craw = DB::table('users')->select('total_scribbls')->where('id', '=', $request->user()->id)->get();
        $c = $craw[0]->total_scribbls;
        DB::table('users')->where('id', '=', $request->user()->id)->update(['total_scribbls' => $c + 1]);

        // Redirect to dashboard after success.
        return redirect()->route('app.dashboard');
    }

    /**
     * Edit a Scribbl.
     */
    public function edit(Request $request)
    {
        // Find the Scribbl from the request
        // and update its information with
        // the new data from the request.
        $scribbl = Scribbl::find($request['id']);
        $scribbl->title = $request['title'];
        $scribbl->description = $request['description'];
        $scribbl->save();

        // Redirect to dashboard after success.
        return redirect()->route('app.dashboard');
    }

    /**
     * Delete a Scribbl from the system.
     */
    public function delete(Request $request)
    {
        // Get the Scribbl requested.
        $scribbl = Scribbl::find($request['id']);
        // Find the Scribbl and delete it from
        // the system using the model.
        $scribbl->delete();

        // Get a list of the scribbls owned by the user.
        $scribbls = Scribbl::where('owner', Auth::user()->id)->get();
        // Get the authenticated user.
        $user = Auth::user();

        // Redirect to dashboard page with authenticated user and their scribbls.
        return redirect()->route('app.dashboard', ['scribbls' => $scribbls, 'user' => $user]);
    }
}