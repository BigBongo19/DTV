<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Reservation;
use App\Tournament;
use App\Court;
use App\User;
use App\Menu;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
    }

    public function edit($id)
    {
        $user = User::where("id", $id)->first();

        return view('admin.edit', [
            'user' => $user
        ]);
    }
    public function editSave(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->last_name = $request->achternaam;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->img_path = $request->file;
        $user->phone_number = $request->phonenumber;
        $user->gender = $request->geslacht;
        if(isset($request->admin)){
            $user->is_admin = $request->admin;
        }else{
            $user->is_admin = 0;
        }

        $user->save();
        return back();
    }

    public function tournamentOverview()
    {
        return view('admin.tournamentList');
    }

    public function addTournament()
    {
        return view('admin.addTournament');
    }

    public function reservations()
    {
        $reservations = Reservation::all();
        $names = Array();
        foreach ($reservations as $reservation) {
            $user = User::find($reservation->user_id);
            array_push($names, ['name' => $user->name,
                'last_name' => $user->last_name]);
        }
        //dd($names[0]['name']);
        return view('admin.reservations', ['reservations' => $reservations, 'names' => $names]);
    }

    public function editReservationView($id)
    {
        $courts = Court::all();
        $reservation = Reservation::find($id);
        return view('admin.editReservation', ['reservation' => $reservation, 'courts' => $courts]);
    }

    public function editReservation(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'court_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        Reservation::where('id', $request->id)->update([
            'court_id' => $request->court_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ]);

        return redirect('admin/reservations')->with('message', "De reservatie is aangepast.");
    }

    public function deleteReservation(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        Reservation::find($request->id)->delete();
        return redirect('admin/reservations')->with('message', "De reservatie is verwijderd.");
    }

    public function menuIndex()
    {
        return view('admin.menu');
    }

    public function menuToevoegen()
    {
        return view('admin.menuToevoegen');
    }




}
