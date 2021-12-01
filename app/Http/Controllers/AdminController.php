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
        return view('admin.index');
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
        return redirect('/admin/users')->with('message', 'Gegevens opgeslagen!');
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
