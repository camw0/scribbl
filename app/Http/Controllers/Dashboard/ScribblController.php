<?php

namespace App\Http\Controllers\Dashboard;

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
     * Show the view page for Scribbls.
     */
    public function view(Request $request): Renderable
    {
        // Get the requested Scribbl.
        $scribbl = Scribbl::find($request['id']);
        // Get the authenticated user.
        $user = Auth::user();

        // If the user is not the Scribbl owner,
        // we need to redirect them to the
        // unauthorised page.
        if (Auth::user()->id != $scribbl->owner) {
            // Return unauthorised page.
            return view('app.unauthorised');
        } else {
            // Return view page with authenticated user and the requested Scribbl.
            return view('app.view', ['scribbl' => $scribbl, 'user' => $user]);
        };
    }

    /**
     * Show the info page for Scribbls.
     */
    public function viewInfo(Request $request): Renderable
    {
        // Get the requested Scribbl.
        $scribbl = Scribbl::find($request['id']);
        // Get the authenticated user.
        $user = Auth::user();

        // If the user is not the Scribbl owner,
        // we need to redirect them to the
        // unauthorised page.
        if (Auth::user()->id != $scribbl->owner) {
            // Return unauthorised page.
            return view('app.unauthorised');
        } else {
            // Return info page with authenticated user and the requested Scribbl.
            return view('app.info', ['scribbl' => $scribbl, 'user' => $user]);
        };
    }

    /**
     * Show the create page for Scribbls.
     */
    public function viewCreate(): Renderable
    {
        // Return creation page.
        return view('app.create');
    }

    /**
     * Create the Scribbl and update the user's total scribbls.
     */
    public function create(Request $request)
    {
        // Create a Scribbl using the model
        // and save it to the database.
        $s = Scribbl::create([
            'owner' => Auth::user()->id,
            'title' => $request['title'],
            'description' => $request['description'],
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
     * Show the edit page for Scribbls.
     */
    public function viewEdit(Request $request): Renderable
    {
        // Get the requested Scribbl.
        $scribbl = Scribbl::find($request['id']);

        // Return edit page with requested Scribbl.
        return view('app.edit', ['scribbl' => $scribbl]);
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
        // Find the Scribbl and delete it from
        // the system using the model.
        $s = Scribbl::find($request['id']);
        $s->delete();

        // Get a list of the scribbls owned by the user.
        $scribbls = Scribbl::where('owner', Auth::user()->id)->get();
        // Get the authenticated user.
        $user = Auth::user();

        // Redirect to dashboard page with authenticated user and their scribbls.
        return redirect()->route('app.dashboard', ['scribbls' => $scribbls, 'user' => $user]);
    }
}
