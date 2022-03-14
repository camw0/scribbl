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
     * Show the application dashboard with private scribbls.
     */
    public function redirect()
    {
        // Redirect to the private dashboard.
        return redirect()->route('app.dashboard.private');
    }
    
    /**
     * Show the application dashboard with private scribbls.
     */
    public function private(): Renderable
    {
        // Get all Scribbls owned by the authenticated user.
        $private = Scribbl::where('owner', Auth::user()->id)->get();

        // Return dashboard page with authenticated user and Scribbls they own.
        return view('app.dashboard.private', ['scribbls' => $private]);
    }

    /**
     * Show the application dashboard with public scribbls.
     */
    public function public(): Renderable
    {
        // Get all public scribbls.
        $public = Scribbl::where('public', true)->get();

        // Return dashboard page with authenticated user and Scribbls they own.
        return view('app.dashboard.public', ['scribbls' => $public]);
    }
}
