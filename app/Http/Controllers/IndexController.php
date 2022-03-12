<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;

class IndexController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index(): Renderable
    {
        return view('index');
    }
}
