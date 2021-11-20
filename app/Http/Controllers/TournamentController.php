<?php

namespace App\Http\Controllers;
use App\Tournament;

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
