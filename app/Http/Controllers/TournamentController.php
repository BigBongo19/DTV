<?php

namespace App\Http\Controllers;
use App\Tournament;

use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        return view('tournaments');
    }

    public function getTournaments(){
        $tournaments = Tournament::all();

        return view('tournaments', ['tournaments' => $tournaments]);
    }
}
