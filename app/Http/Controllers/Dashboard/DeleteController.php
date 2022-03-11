<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Scribbl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $s = Scribbl::find($request->id);
        $s->delete();

        $scribbls = Scribbl::where('owner', Auth::user()->id)->get();
        $user = Auth::user();

        return redirect()->route('app.dashboard', ['scribbls' => $scribbls, 'user' => $user]);
    }
}
