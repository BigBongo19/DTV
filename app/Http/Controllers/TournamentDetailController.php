<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournamentDetailController extends Controller
{
    public function index()
    {
        return view('tournament-detail');
    }
}
