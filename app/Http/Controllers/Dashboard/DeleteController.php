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
        $scribbl = Scribbl::find($request->id);
        $scribbl->delete();
    
        $scribbls = Scribbl::all();
        return view('app.dashboard', ['scribbls' => $scribbls]);
    }
}
