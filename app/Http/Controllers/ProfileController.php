<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $user = $id = Auth::user();

        return view('profileIndex', compact('user'));
    }

    public function edit() {
        $user = $id = Auth::user();

        return view('editIndex', compact('user'));
    }

    public function payment() {
        return view('paymentIndex');
    }
}
