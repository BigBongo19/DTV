<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        return view('profileIndex');
    }

    public function edit() {
        return view('editIndex');
    }

    public function payment() {
        return view('paymentIndex');
    }
}
