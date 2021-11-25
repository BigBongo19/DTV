<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Tournament;

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

    public function tournamentOverview()
    {
        return view('admin.tournamentList');
    }

    public function addTournament()
    {
        return view('admin.addTournament');
    }

    public function reservations()
    {
        return view('admin.reservations');
    }

    public function menu(){
        return view('admin.menu');
    }


}
