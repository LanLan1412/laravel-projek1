<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('user.index', compact('user'));
    }

    public function update(Request $request) {
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->update();
        return redirect('/profile');
    }
}
