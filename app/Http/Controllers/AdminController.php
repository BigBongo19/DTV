<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Tournament;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Reservation;
use App\Court;
use App\User;
use App\Menu;



class AdminController extends Controller
{
    public function index()
    {

        $users = User::all();
        $menus = Menu::all();
        $wedstrijden = Tournament::where('start_date', '>=', Carbon::now())->count();
        $reservations = Reservation::all();

        return view('admin.index', [
            'users' => $users,
            'menus' => $menus,
            'wedstrijden' => $wedstrijden,
            'reservations' => $reservations
        ]);
    }

    public function users()
    {
        $users = User::all();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        return redirect('/admin/users')->with('message', 'user is verwijderd!');

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
        if(isset($request->password)){
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->phone_number = $request->phonenumber;
        $user->gender = $request->geslacht;
        if (isset($request->admin)) {
            $user->is_admin = $request->admin;
        } else {
            $user->is_admin = 0;
        }

        $user->save();
        return back();
    }


    public function courtView()
    {
        $courts = Court::all();
        return view('admin.court', ['courts' => $courts]);
    }

    public function addCourtView()
    {
        return view('admin.addCourt');
    }

    public function addCourt(Request $request)
    {
        $request->validate([
            'courtName' => 'required|max:255',
            'courtType' => 'required|max:255',
            'isInside' => 'required',
        ]);

        $court = new Court();
        $court->name = $request->courtName;
        $court->type = $request->courtType;
        $court->is_inside = ($request->isInside == "on") ? 1 : 0;
        $court->save();

        return redirect('admin/court')->with('message', "Baan is toegevoegd");
    }

    public function editCourtView($id)
    {
        $court = Court::find($id);
        return view('admin.editCourt', ['court' => $court]);
    }

    public function editCourt(Request $request)
    {
        $request->validate([
            'courtName' => 'required|max:255',
            'courtType' => 'required|max:255',
            'isInside' => 'required',
        ]);

        Court::where('id', $request->id)->update([
            'name' => $request->courtName,
            'type' => $request->courtType,
            'is_inside' => ($request->isInside == "on") ? 1 : 0,
        ]);

        return redirect('admin/court')->with('message', "Baan is bijgewerkt");
    }

    public function ReserveCourt(Request $request, $id){
        $validated = $request->validate([
            'datum' => 'required|date_format:m/d/Y',
        ]);
        $date = $request->datum;
        $court_id = $id;
        $endOfDay = new Carbon($request->datum." 23:59");
        if($endOfDay->isPast()){
            return redirect('/reserveren')->with('warning', 'Deze datum is al geweest');
        }

        if(Court::find($id)){
            function get_hours_range( $start = 0, $end = 86400, $step = 3600, $format = 'g:i a' ) {
                $times = array();
                foreach ( range( $start, $end, $step ) as $timestamp ) {
                    $hour_mins = gmdate( 'H,i', $timestamp );
                    if ( ! empty( $format ) )
                        $times[$hour_mins] = $hour_mins ;
                    else $times[$hour_mins] = $hour_mins;
                }

                return $times;
            }
            $times = get_hours_range( 32400, 57600, 3600, 'H:i' );

            return view('reservecourt', compact('times', 'date', 'court_id'));
        }
        else {
            return redirect('reserveren')->with('warning', 'Deze baan bestaat niet');
        }

    }

    /*public function checkReservationDate(Request $request) {
        $request->validate([
            'start_date' => 'required|date_format:m/d/Y',
            'end_date' => 'required|date_format:m/d/Y',
        ]);
        $date = $request->start_date;
        $endOfDay = new Carbon($request->start_date." 23:59");
        if($endOfDay->isPast()){
            return redirect('/reserveren')->with('warning', 'Deze datum is al geweest');
        }
    }*/

    public function deleteCourt($id)
    {
        if (!$id) {
            return redirect('admin/court')->with('error', "Er is iets fout gegaan");
        }
        Court::find($id)->delete();
        return redirect('admin/court')->with('message', "De Baan is verwijderd.");
    }

    public function tournamentOverview()
    {
        return view('admin.tournamentList');
    }

    public function addTournament()
    {
        $courts = Court::all();
        return view('admin.addTournament', ['courts' => $courts]);
    }

    public function reservations()
    {
        $reservations = Reservation::all();
        $names = array();
        foreach ($reservations as $reservation) {
            $user = User::find($reservation->user_id);
            array_push($names, ['name' => $user->name,
                'last_name' => $user->last_name]);
        }
        //dd($names[0]['name']);
        return view('admin.reservations', ['reservations' => $reservations, 'names' => $names]);
    }

    public function addReservationView()
    {
        $courts = Court::all();
        return view('admin.addReservation', ['courts' => $courts]);
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
