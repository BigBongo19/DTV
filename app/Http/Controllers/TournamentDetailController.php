<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tournament;
use App\Tournament_registration;

class TournamentDetailController extends Controller
{
    public function index($id)
    {
        $tournament = Tournament::find($id);
        $participant_registrations = $this->getParticipants($id);
        $participants = Array();

        foreach ($participant_registrations as $registration){
            $user = User::find($registration->user_id);
            array_push($participants, ['name' => $user->name, 'last_name' => $user->last_name, 'registration_date' => $registration->created_at]);
        }
        return ($tournament) ? view('tournament-detail', ['tournament' => $tournament, 'participants' => $participants]) :
        response(view('404'), 404);
    }

    public function getParticipants($id) {
        return Tournament_registration::where('tournament_id', '=', $id)->get();
    }

    public function submitTournamentRegistration(Request $request){
        $request->validate([
            'user_id' => 'required',
            'tournament_id' => 'required',
            'created_at' => 'required'
        ]);

        $tournament_registration = new Tournament_registration();
        $tournament_registration->user_id = Auth::id();//$request->user_id;
        $tournament_registration->tournament_id = $request->tournament_id;
        $tournament_registration->created_at = Carbon::now();

        $tournament_registration->save();
        return redirect('/admin/toernooien')->with('message','U bent registreerd voor dit toernooi.');
    }
}
