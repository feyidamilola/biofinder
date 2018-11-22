<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    //
    public function register(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();

            // check if user exists
            $userCount = User::where('email', $data['email-add'])->count();
            if($userCount > 0) {
                return back()->with('flash_message_error', 'Email account already exists');
            } else {
                echo 'success'; die;
            }
        }
        return view('users.login');
    }

    public function checkEmail(Request $request)  {
        if($request->isMethod('post')) {
            $data = $request->all();

            // check if user exists
            $userCount = User::where('email', $data['email-add'])->count();
            if($userCount > 0) {
                return back()->with('flash_message_error', 'Email account already exists');
            } else {
                echo 'success'; die;
            }
        }
    }
}
