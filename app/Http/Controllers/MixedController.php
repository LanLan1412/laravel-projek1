<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class MixedController extends Controller
{
    public function order() {
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->get();
        return view('dashboard.pesanan', compact('pesanans'));
    }
}
