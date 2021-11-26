<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        $user = $id = Auth::user();

        return view('profileIndex', compact('user'));
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
        session()->flash('message','Uw gegevens zijn aangepast');
        return back();
    }

    public function editPassword(Request $request)
    {

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

              session()->flash('message','Uw wachtwoord is aangepast');
              return redirect()->back();
            }

            else{
                  session()->flash('warning','Het nieuwe wachtwoord kan niet het zelfde als de oude zijn');
                  return redirect()->back();
                }

           }

          else{
               session()->flash('warning','Het oude wachtwoord klopt niet');
               return redirect()->back();
             }

       }

    public function payment() {
        return view('paymentIndex');
    }
}
