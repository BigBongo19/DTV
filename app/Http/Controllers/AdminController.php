<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function edit()
    {
        return view('admin.edit');
    }

    public function add()
    {
        return view('admin.add');
    }

    public function reservations()
    {
        return view('admin.reservations');
    }
}
