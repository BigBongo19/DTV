<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function edit()
    {
        return view('admin.edit');
    }

    public function reservations()
    {
        return view('admin.reservations');
    }
  
    public function add()
    {
        return view('admin.add');
    }
}
