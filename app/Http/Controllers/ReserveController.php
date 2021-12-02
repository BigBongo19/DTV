<?php

namespace App\Http\Controllers;

use App\Tournament;
use Carbon\Carbon;
use App\Court;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Expr\New_;
use App\Reservation;

class ReserveController extends Controller
{
    public function index(Request $request)
    {

        if (isset($request->datum)) {


            $date = $request->datum;

            $validated = $request->validate([
                'datum' => 'required|date_format:m/d/Y',
            ]);
            $EndDay = new Carbon($request->datum . " 23:59");
            if ($EndDay->isPast()) {
                return redirect('/reserveren')->with('warning', 'Deze datum is al geweest');
            }

            $lastdate = Carbon::now()->addDays(7);

            if ($EndDay->gt($lastdate)) {
                return redirect('/reserveren')->with('warning', 'Je kan niet zo ver in de toekomst reserveren');
            }

            $courts = Court::all();

            return view('/reserve-date', compact('courts', 'date'));
        }
        $reservation = Reservation::where('user_id', Auth::id())->whereDate('start_time', '>', Carbon::now())->first();
        // dd($reservation);
        if (!empty($reservation)) {
            return view('pending', compact('reservation'));
        } else {
            return view('reserve');
        }
    }

    public function ReserveCourt(Request $request, $id)
    {
        $validated = $request->validate([
            'datum' => 'required|date_format:m/d/Y',
        ]);
        $date = $request->datum;
        $court_id = $id;
        $startOfDay = new Carbon($request->datum . " 00:00");
        $endOfDay = new Carbon($request->datum . " 23:59");
        if ($endOfDay->isPast()) {
            return redirect('/reserveren')->with('warning', 'Deze datum is al geweest');
        }

        if (Court::find($id)) {
            $times = $this->get_hours_range(32400, 57600, 3600, 'H:i');

            $reservations = Reservation::whereBetween('start_time', [$startOfDay, $endOfDay])->get();
            $reservationsTimes = [];
            foreach ($reservations as $reservation) {
                $reservationsTimes[] = Carbon::parse($reservation->start_time)->format('H,i');
            }

            return view('reservecourt', compact('times', 'date', 'court_id', 'reservationsTimes'));
        } else {
            return redirect('reserveren')->with('warning', 'Deze baan bestaat niet');
        }
    }

    function get_hours_range($start = 0, $end = 86400, $step = 3600, $format = 'g:i a')
    {
        $times = array();
        foreach (range($start, $end, $step) as $timestamp) {
            $hour_mins = gmdate('H,i', $timestamp);
            if (!empty($format))
                $times[$hour_mins] = $hour_mins;
            else $times[$hour_mins] = $hour_mins;
        }

        return $times;
    }

    public function ConfirmReservation(Request $request)
    {

        $validated = $request->validate([
            'time_submit' => 'required|date_format:H:i',
            'court_id' => 'required',
            'date' => 'required|date',
        ]);

        $date = new Carbon($request->date . " " . $request->time_submit);
        $enddate = new Carbon($request->date . " " . $request->time_submit);

        if ($date->isPast()) {
            return back()->with('warning', 'Deze datum is al geweest');
        }


        $reservation = new Reservation();
        $reservation->court_id = $request->court_id;
        $reservation->user_id = Auth::id();
        $reservation->start_time = $date;
        $reservation->end_time = $enddate->addHour();
        $reservation->save();
        return redirect('reserveren')->with('message', 'Je reservatie is gelukt!');
    }

    public function cancel($id)
    {
        $reservation = Reservation::find($id);
        if ($reservation) {
            if ($reservation->user_id == Auth::id()) {
                $reservation->delete();
                return redirect('reserveren')->with('message', 'Je reservatie is verwijderd!');
            } else {
                return redirect('reserveren')->with('warning', 'Deze reservatie is niet van jou');
            }
        } else {
            return redirect('reserveren')->with('warning', 'Er is iets fout gegaan');
        }
    }

    public function reservations()
    {
        $reservations = Reservation::all();
        $names = array();
        foreach ($reservations as $reservation) {
            $user = User::find($reservation->user_id);
            array_push($names, [
                'name' => $user->name,
                'last_name' => $user->last_name
            ]);
        }
        //dd($names[0]['name']);
        return view('admin.reservations', ['reservations' => $reservations, 'names' => $names]);
    }

    public function addReservationView()
    {
        $courts = Court::all();
        return view('admin.addReservation', compact('courts'));
    }

    public function addAdminReservation(Request $request)
    {
        $request->validate([
            'court_id' => 'required',
            'time' => 'required'
        ]);
        $time = strtotime($request->time);
        $start_time = date("Y-m-d H:00:00", $time);
        $end_time = date("Y-m-d H:00:00", $time + 3600);

        $selection = Reservation::all()->where('court_id', '=', $request->court_id);
                                //->where('start_time', '>', Carbon::now()/*$start_time*/)->get();
        foreach ($selection as $reservation) {
            if($reservation->start_time == $start_time) {
                return redirect()->back()->with('error', "Deze baan is op dit tijdstip al gereserveerd");
            }
        }

        dd(get_defined_vars());
        $court = new Reservation();
        $court->court_id = $request->court_id;
        $court->user_id = Auth::id();
        $court->start_time = $start_time;
        $court->end_time = $end_time;
        $court->save();

        return redirect('admin/reservations')->with('message', "Reservatie is toegevoegd");
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
}
