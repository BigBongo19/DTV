<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\Tournament_registration;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TournamentController extends Controller
{
    public function index()
    {
//        $offset = 0;
//        $amount = 10;
//        $tournaments = Tournament::offset($offset * $amount)->limit($amount)->get();
//        $id = tour
//        $tournament_count = Tournament::where('tournament_id', $id)->count();

        $tournaments = Tournament::all();//whereDate('start_date', '>=', Carbon::now())->get();
        $participant_list = Array();
        foreach ($tournaments as $tournament) {
            array_push($participant_list, Tournament_registration::where('tournament_id', '=', $tournament['id'])->count());
        }
        return view('tournaments', ['tournaments' => $tournaments, 'participant_list' => $participant_list]);
    }

    public function getTournamentById($id) {
        $tournament = Tournament::find($id)->get();
        $participants = Tournament_registration::all()->where('tournament_id', $id);
        return view('tournaments', ['tournament' => $tournament, 'participants' => $participants]);

    }
}
