<?php

namespace App\Http\Controllers;

use App\Tournament;
use Carbon\Carbon;
use App\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Expr\New_;
use App\Reservation;

class ReserveController extends Controller
{
    public function index(Request $request)
    {
        $date = new Carbon($request->datum." 23:59");
        if($date->isPast()){
            return redirect('/reserveren')->with('warning', 'Deze datum is al geweest');
        }
        if(isset($request->datum)){
            $date = $request->datum;

            $validated = $request->validate([
                'datum' => 'required|date_format:m/d/Y',
            ]);
            $courts = Court::all();

            return view('/reserve-date', compact('courts', 'date'));
        }
        $reservation = Reservation::where('user_id', Auth::id())->whereDate('start_time', '>', Carbon::now())->first();
        // dd($reservation);
        if(!empty($reservation)){
            return view('pending', compact('reservation'));
        }
        else{
            return view('reserve');
        }


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

    public function ConfirmResevation(Request $request){

            $validated = $request->validate([
                'time_submit' => 'required|date_format:H:i',
                'court_id' => 'required',
                'date' => 'required|date',
            ]);

            $date = new Carbon($request->date." ".$request->time_submit);
            $enddate = new Carbon($request->date." ".$request->time_submit);

            if($date->isPast()){
                return back()->with('warning', 'Deze datum is al geweest');
            }



            $reservation = new Reservation;
            $reservation->court_id = $request->court_id;
            $reservation->user_id = Auth::id();
            $reservation->start_time = $date;
            $reservation->end_time = $enddate->addHour();
            $reservation->save();
            return redirect('reserveren')->with('message', 'Je reservatie is gelukt!');

    }

    public function cancel($id){
        $reservation = Reservation::find($id);
        if($reservation){
            if($reservation->user_id == Auth::id()){
                $reservation->delete();
                return redirect('reserveren')->with('message', 'Je reservatie is verwijderd!');
            }  else{
                return redirect('reserveren')->with('warning', 'Deze reservatie is niet van jou');
            }
        } else{
            return redirect('reserveren')->with('warning', 'Er is iets fout gegaan');
        }
    }


}
