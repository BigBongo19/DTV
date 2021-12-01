<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Court;

class CourtController extends Controller
{
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

    public function deleteCourt($id)
    {
        if (!$id) {
            return redirect('admin/court')->with('error', "Er is iets fout gegaan");
        }
        Court::find($id)->delete();
        return redirect('admin/court')->with('message', "De Baan is verwijderd.");
    }
}
