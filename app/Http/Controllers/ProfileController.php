<?php

namespace App\Http\Controllers;

use App\TournamentRegistration;
use App\User;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        $resTournaments = TournamentRegistration::where('user_id', $user->id)->get();
        $resCourts = Reservation::where('user_id', $user->id)->get();

        return view('profileIndex', compact('user', 'resTournaments', 'resCourts'));
    }

    public function editIndex() {
        $user = $id = Auth::user();

        return view('editaccount', compact('user'));
    }

    public function edit(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone;
        $user->gender = $request->gender;
        $user->save();
        // session()->flash('message','Uw gegevens zijn aangepast');
        return redirect('/profile')->with('message','Uw gegevens zijn aangepast');
    }

    public function editPassword(Request $request){

        $this->validate($request, [
        'oldpassword' => 'required',
        'newpassword' => 'required',
        ]);

       $hashedPassword = Auth::user()->password;

       if (Hash::check($request->oldpassword , $hashedPassword )) {

            if (!Hash::check($request->newpassword , $hashedPassword)) {

                $user = User::find(Auth::user()->id);
                $user->password = bcrypt($request->newpassword);
                $user->save();

                /* session()->flash('message','Uw wachtwoord is aangepast');
                return redirect()->back(); */
                return redirect('/edit-profile')->with('message','Uw wachtwoord is aangepast');
            }

            else{
                /* session()->flash('warning','Het nieuwe wachtwoord kan niet het zelfde als de oude zijn');
                return redirect()->back(); */
                return redirect('/edit-profile')->with('warning','Het nieuwe wachtwoord kan niet het zelfde als de oude zijn');
            }

        }

        else{
            /* session()->flash('warning','Het oude wachtwoord klopt niet');
            return redirect()->back(); */
            return redirect('/edit-profile')->with('warning','Het oude wachtwoord klopt niet');
        }
    }

    public function upload(Request $request)
    {

        if(!$request->file('image') == null){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $user = User::find(Auth::user()->id);

            if(isset($user->img_path)){
                Storage::disk('public')->delete($user->img_path);
            }

            $path = Storage::disk('public')->put('avatars', $request->file('image'));
            $user->img_path = $path;
            $user->save();
            // return redirect()->back()->with('message','Uw profielfoto is aangepast');
            return redirect('/edit-profile')->with('message','Uw profielfoto is aangepast');
        }
        else{
            // return redirect()->back()->with('error','Er is iets fout gegaan');
            return redirect('/edit-profile')->with('error','Er is iets fout gegaan');
        }
    }
    public function removeImage(){
        $user = User::find(Auth::user()->id);
        Storage::disk('public')->delete($user->img_path);
        $user->img_path = NULL;
        $user->save();
        // return redirect()->back()->with('message','Uw profielfoto is verwijderd');
        return redirect('/edit-profile')->with('message','Uw profielfoto is verwijderd');
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

    public function editPage($id)
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

        if (isset($request->member)) {
            $user->is_member = $request->member;
        } else {
            $user->is_member = 0;
        }

        $user->save();
        return redirect('/admin/users')->with('message', 'Gegevens opgeslagen!');
    }
}
