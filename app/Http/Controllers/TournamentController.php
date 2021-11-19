<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TournamentController extends Controller
{
    public function index()
    {
//        $offset = 0;
//        $amount = 10;
//        $tournaments = \App\Tournament::offset($offset * $amount)->limit($amount)->get();
//        $id = tour
//        $tournament_count = Tournament::where('tournament_id', $id)->count();

        $tournaments = Tournament::whereDate('start_date', '>=', Carbon::now())->get();
        dd($tournaments[0]);
        return view('tournaments', ['tournaments' => $tournaments]);
    }
}
