<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Scribbl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
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
     * Delete a Scribbl from the system.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $scribbls = Scribbl::where('owner', Auth::user()->id)->get();
    
        if (Auth::user()->id !== $scribbl->owner) {
            return view('app.unauthorised');
        } else {
            $s = Scribbl::find($request->id);
            $s->delete();
            return view('app.dashboard', ['scribbls' => $scribbls]);
        };

    }
}
