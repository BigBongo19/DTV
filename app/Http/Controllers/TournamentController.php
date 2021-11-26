<?php

namespace App\Http\Controllers;
use App\Tournament;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TournamentController extends Controller
{
    public function index()
    {
        return view('tournaments');
    }

    public function submitTournament(Request $request){
        $request->validate([
            'titleTournament' => 'required|max:50',
            'selectLane' => 'required',
            'dateTournamentStart' => 'required',
            'dateTournamentEnd' => 'required',
            'descTournament' => 'required|max:200'
        ]);

        $tournament = new Tournament;
        $tournament->title = $request->titleTournament;
        $tournament->lane = $request->selectLane;
        $tournament->max_participants = 32;
        $tournament->start_date = $request->dateTournamentStart;
        $tournament->end_date = $request->dateTournamentEnd;
        $tournament->description = $request->descTournament;

        $tournament->save();
        return redirect('/admin/tournamentList')->with('message','Het toernooi is aangemaakt!');
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
        $tournament = Tournament::find($id);
        $startdate  = Carbon::parse($tournament->start_date)->format('Y-m-d\TH:i');
        $enddate    = Carbon::parse($tournament->end_date)->format('Y-m-d\TH:i');
        // dd(Session::all());
        return view('admin.editTournament', compact('startdate', 'enddate', 'tournament'));
    }

    public function getTournamentByDate(Request $request){
        $date = $request->datePicker;
        $tournaments = Tournament::where('end_date', '<=', $date)->get();
        dd($tournaments);

        $tournaments = Tournament::find($date);
        return view('reserve')

    }

    public function editTournament(Request $request){
        $request->validate([
            'titleTournament' => 'required|max:50',
            'selectLane' => 'required',
            'dateTournamentStart' => 'required',
            'dateTournamentEnd' => 'required',
            'descTournament' => 'required|max:200'
        ]);
        $tournament = Tournament::find($request->id);
        $tournament->title = $request->titleTournament;
        $tournament->lane = $request->selectLane;
        $tournament->max_participants = 32;
        $tournament->start_date = $request->dateTournamentStart;
        $tournament->end_date = $request->dateTournamentEnd;
        $tournament->description = $request->descTournament;

        $tournament->save();
        return redirect('/admin/tournamentList')->with('message','Gegevens opgeslagen!');
    }

    public function deleteTournament($id){
        Tournament::find($id)->delete();
        return redirect('/admin/tournamentList')->with('message','Toernooi is verwijderd!');
    }
}
