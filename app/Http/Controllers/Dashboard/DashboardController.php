<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Scribbl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
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
     */
    public function index(): Renderable
    {
        $scribbls = Scribbl::where('owner', Auth::user()->id)->get();
        $user = Auth::user();

        return view('app.dashboard', ['scribbls' => $scribbls, 'user' => $user]);
    }
}
