<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\TournamentRegistration;
use Illuminate\Http\Request;
use App\Tournament;
use Carbon\Carbon;
use App\User;

class TournamentController extends Controller
{
    public function index()
    {
//        $offset = 0;
//        $amount = 10;
//        $tournaments = Tournament::offset($offset * $amount)->limit($amount)->get();
//        $id = tour
//        $tournament_count = Tournament::where('tournament_id', $id)->count();

        $tournaments = Tournament::whereDate('start_date', '>=', Carbon::now())->get();
        $participant_list = array();
        foreach ($tournaments as $tournament) {
            array_push($participant_list, TournamentRegistration::where('tournament_id', '=', $tournament['id'])->count());
        }
        return view('tournaments', ['tournaments' => $tournaments, 'participant_list' => $participant_list]);
    }

    public function getTournamentById($id)
    {
        $tournament = Tournament::find($id);
        if (!$tournament) {
            abort(404);
        }
        $participant_registrations = $this->getParticipants($id);
        $participants = array();

        foreach ($participant_registrations as $registration) {
            $user = User::find($registration->user_id);
            array_push($participants, [
                'name' => $user->name,
                'last_name' => $user->last_name,
                'registration_date' => $registration->created_at]);
        }
        return view('tournament-detail', [
            'tournament' => $tournament,
            'participants' => $participants]);
    }

    public function getParticipants($id)
    {
        return TournamentRegistration::where('tournament_id', '=', $id)->get();
    }

    public function submitTournamentRegistration(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required',
        ]);

        $id = $request->tournament_id;
        $tournament = Tournament::find($id);

        if (!$tournament) {
            return redirect()->back()->with('error', "Dit toernooi bestaat niet.");
        }

        if ($tournament->start_date < Carbon::now()) {
            return redirect()->back()->with('error', "Dit toernooi is niet meer geldig.");
        }

        $registrations = TournamentRegistration::where('tournament_id', '=', $id)->get();
        if(count($registrations) >= $tournament->max_participants) {
            return redirect()->back()->with('error', "Dit toernooi zit vol.");
        }

        foreach ($registrations as $registration) {
            if ($registration->user_id == Auth::id()) {
                return redirect()->back()->with('error', "U bent reeds registreerd voor dit toernooi.");
            }
        }

        $tournamentRegistration = new TournamentRegistration();
        $tournamentRegistration->user_id = Auth::id();
        $tournamentRegistration->tournament_id = $request->tournament_id;
        $tournamentRegistration->save();
        return redirect('/toernooi/' . $id)->with('message', "U bent registreerd voor dit toernooi.");
    }
}
