<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UseraccountController extends Controller
{
    // authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::whereId('id', Auth::user()->id);
        return view('manage.user-account.view.index', compact('user'));
    }

    public function edit()
    {
        return view('manage.user-account.edit.update');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $email = $request->input('email');

        User::whereId($id)->update([
            'name' => $name,
            'lastname' => $lastname,
            'email' => $email,
        ]);

        $message = 'Account successfully updated...';

        return redirect('/useraccount')->with('success-message', $message);
    }

    public function changePassword()
    {
        return view('manage.user-account.password.update');
    }

    public function postChangePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (Hash::check($request->input('current-password'), Auth::user()->password)) {
            User::whereId(Auth::User()->id)->update([
                'password' => Hash::make($request->input('password')),
            ]);

            $message = 'Password successfully updated...';
            return redirect('/useraccount')->with('success-message', $message);
        } else {
            $error = 'Please enter correct current password!';
            return redirect()->back()->with('error', $error);
        }
    }
}
