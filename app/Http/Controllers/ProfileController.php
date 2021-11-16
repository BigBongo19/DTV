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
        return view('editIndex');
    }

    public function payment() {
        return view('paymentIndex');
    }
}
