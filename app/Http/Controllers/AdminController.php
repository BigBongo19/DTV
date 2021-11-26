<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Tournament;

use Illuminate\Http\Request;
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
        return view('admin.reservations');
    }

    public function menuIndex()
    {
        return view('admin.menuBewerken');
    }

    public function menuToevoegen()
    {
        return view('admin.menuToevoegen');
    }

    public function saveMenu(Request $request){
        $menu = new Menu;
        $menu->name = $request->itemNaam;
        $menu->price = $request->priceInput;
        $menu->type = $request->typeInput;

        if(isset($request->aanbieding)){
            $menu->sale = $request->aanbieding;
        }else{
            $menu->sale = 0;
        }

        $menu->save();
        return back();
    }


}
