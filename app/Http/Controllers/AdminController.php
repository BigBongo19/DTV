<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Tournament;

use Illuminate\Http\Request;
use App\User;

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
    public function editsave($id)
    {
        $user = User::where("id", $id)->first();

        return view('admin.edit', [
            'user' => $user
        ]);
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

    
}
