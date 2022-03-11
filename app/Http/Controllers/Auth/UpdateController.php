<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    /**
     * Update the authenticated users' email.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|max:255',
        ]);

        $u = Auth::user();
        $u->email = $request['email'];
        $u->save();

        return redirect()->route('app.account', ['user' => $u]);
    }
}
