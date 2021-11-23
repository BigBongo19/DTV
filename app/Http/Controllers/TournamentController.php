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

    public function submitTournament(Request $request){
        $tournament = new Tournament;
        $tournament->title = $request->titleTournament;
        $tournament->lane = $request->selectLane;
        $tournament->max_participants = 32;
        $tournament->start_date = $request->dateTournamentStart;
        $tournament->end_date = $request->dateTournamentEnd;
        $tournament->description = $request->descTournament;

        $tournament->save();
        return back();
    }

    public function getTournaments(){
        $tournaments = Tournament::all();

        return view('tournaments', ['tournaments' => $tournaments]);
    }

    public function getTournamentsAdmin(){
        $tournaments = Tournament::all();

        return view('admin.tournamentList', ['tournaments' => $tournaments]);
    }

    public function getTournamentById(Request $request, $id){
        $tournaments = Tournament::find($id);
        return view('admin.editTournament', ['tournaments' => $tournaments]);
    }

    public function editTournament(Request $request){
        $tournament = Tournament::find($request->id);
        $tournament->title = $request->titleTournament;
        $tournament->lane = $request->selectLane;
        $tournament->max_participants = 32;
        $tournament->start_date = $request->dateTournamentStart;
        $tournament->end_date = $request->dateTournamentEnd;
        $tournament->description = $request->descTournament;

        $tournament->save();
        return back();
    }
}
