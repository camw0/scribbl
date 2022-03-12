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
        $scribbl = Scribbl::find($request['id']);
        $user = Auth::user();

        if (Auth::user()->id != $scribbl->owner) {
            return view('app.unauthorised');
        } else {
            return view('app.view', ['scribbl' => $scribbl, 'user' => $user]);
        };
    }

    /**
     * Show the create page for Scribbls.
     */
    public function viewCreate(): Renderable
    {
        return view('app.create');
    }

    /**
     * Create the Scribbl and update the user's total scribbls.
     */
    public function create(Request $request)
    {
        $s = Scribbl::create([
            'owner' => Auth::user()->id,
            'title' => $request['title'],
            'description' => $request['description'],
        ]);
        $s->save();

        $craw = DB::table('users')->select('total_scribbls')->where('id', '=', $request->user()->id)->get();
        $c = $craw[0]->total_scribbls;
        DB::table('users')->where('id', '=', $request->user()->id)->update(['total_scribbls' => $c + 1]);

        return redirect()->route('app.dashboard');
    }

    /**
     * Show the edit page for Scribbls.
     */
    public function viewEdit(Request $request): Renderable
    {
        $scribbl = Scribbl::find($request['id']);

        return view('app.edit', ['scribbl' => $scribbl]);
    }

    /**
     * Edit a Scribbl.
     */
    public function edit(Request $request)
    {
        $scribbl = Scribbl::find($request['id']);
        $scribbl->title = $request['title'];
        $scribbl->description = $request['description'];
        $scribbl->save();

        return redirect()->route('app.dashboard');
    }

    /**
     * Delete a Scribbl from the system.
     */
    public function delete(Request $request)
    {                
        $s = Scribbl::find($request['id']);
        $s->delete();

        $scribbls = Scribbl::where('owner', Auth::user()->id)->get();
        $user = Auth::user();

        return redirect()->route('app.dashboard', ['scribbls' => $scribbls, 'user' => $user]);
    }
}
