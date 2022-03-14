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
        // Get the authenticated user.
        $user = Auth::user();
    
        // Get all Scribbls owned by the authenticated user.
        $scribbls = Scribbl::where('owner', $user->id)->get();

        $public = Scribbl::where('public', true)->get();

        // Return dashboard page with authenticated user and Scribbls they own.
        return view('app.dashboard', ['scribbls' => $scribbls, 'user' => $user, 'public' => $public]);
    }
}
