<?php

namespace App\Http\Controllers;

use App\Tournament;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function index()
    {
        return view('reserve');
    }

    public function withDate(){
        return view('reserve-date');
    }

    public function getLaneByDate(Request $request){
        $date = $request->date;
        if($date !== null) {
            $tournaments = Tournament::where('end_date', '<=', $date)->get();
            // dd($tournaments);
            return view('/reserve-date', compact('tournaments'));
        } else {
            return redirect('/reserveren')->with('message', 'Kies eerst een datum!');
        }


    }
}
