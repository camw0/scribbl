<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CreateController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('app.create');
    }

    /**
     * Create the Scribbl and update the user's total scribbls.
     *
     */
    public function create(Request $request)
    {
        $craw = DB::table('users')->select('total_scribbls')->where('id', '=', $request->user()->id)->get();
        $c = $craw[0]->total_scribbls;
        DB::table('users')->where('id', '=', $request->user()->id)->update(['total_scribbls' => $c + 1]);

        return redirect()->route('app.dashboard');
    }
}
