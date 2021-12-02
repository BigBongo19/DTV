<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\TournamentRegistration;
use Illuminate\Http\Request;
use App\Tournament;
use Carbon\Carbon;
use App\User;
use App\Court;


class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::where('start_date', '>=', Carbon::now())->get();
        $participant_list = array();
        foreach ($tournaments as $tournament) {
            array_push($participant_list, TournamentRegistration::where('tournament_id', '=', $tournament['id'])->count());
        }
        return view('tournaments', ['tournaments' => $tournaments, 'participant_list' => $participant_list]);
    }

    public function getTournamentWithRegistrations($id)
    {
        $tournament = Tournament::find($id);
        if (!$tournament) {
            abort(404);
        }
        $participant_registrations = $this->getParticipants($id);
        $participants = array();
        $i = 0;
        foreach ($participant_registrations as $registration) {
            $user = User::find($registration->user_id);
            if($user != null) {
                array_push($participants, [
                    'name' => $user->name,
                    'last_name' => $user->last_name,
                    'registration_date' => $registration->created_at]);
            } else {
                //dd(get_defined_vars());
                TournamentRegistration::where('id', '=', $registration->id)->delete();
                unset($participant_registrations[$i]);
            }
            $i++;
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
        if (count($registrations) >= $tournament->max_participants) {
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
        $tournamentRegistration->registered_by = Auth::user()->name . ' ' .Auth::user()->last_name;
        $tournamentRegistration->save();
        return redirect('/toernooi/' . $id)->with('message', "U bent registreerd voor dit toernooi.");
    }

    public function getTournamentRegistration(){
        $registeredTournaments = TournamentRegistration::all();

        return view('admin.registeredTournaments', compact('registeredTournaments'));
    }

    /* public function tournamentOverview()
    {
        return view('admin.tournamentList');
    } */

    public function addTournament()
    {
        $courts = Court::all();
        return view('admin.addTournament', ['courts' => $courts]);
    }


    public function submitTournament(Request $request)
    {
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
        return redirect('/admin/tournament/list')->with('message', 'Het toernooi is aangemaakt!');
    }

    public function getTournaments()
    {
        $tournaments = Tournament::all();

        return view('tournaments', ['tournaments' => $tournaments]);
    }

    public function getTournamentsAdmin()
    {
        $tournaments = Tournament::all();
        $participant_list = array();
        foreach ($tournaments as $tournament) {
            array_push($participant_list, TournamentRegistration::where('tournament_id', '=', $tournament['id'])->count());
        }

        return view('admin.tournamentList', ['tournaments' => $tournaments, 'participant_list' => $participant_list]);
    }

    public function getTournamentById(Request $request, $id)
    {
        $tournament = Tournament::find($id);

        if ($tournament != null) {
            $startdate  = Carbon::parse($tournament->start_date)->format('Y-m-d\TH:i');
            $enddate    = Carbon::parse($tournament->end_date)->format('Y-m-d\TH:i');
            $courts = Court::all();
            // dd(Session::all());
            return view('admin.editTournament', compact('startdate', 'enddate', 'tournament', 'courts'));
        } else {
            return redirect('/admin/tournament/list')->with('error', 'Dit toernooi bestaat niet.');
        }
    }

    public function editTournament(Request $request)
    {
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
        return redirect('/admin/tournament/list')->with('message', 'Gegevens opgeslagen!');
    }

    public function deleteTournament($id)
    {
        Tournament::find($id)->delete();
        return redirect('/admin/tournament/list')->with('message', 'Toernooi is verwijderd!');
    }

    public function deleteRegisteredTournament($id)
    {
        TournamentRegistration::find($id)->delete();
        return redirect('/admin/tournament/registered')->with('message', 'De inschrijving is verwijderd!');
    }
}
