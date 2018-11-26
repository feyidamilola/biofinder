<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;

class UsersController extends Controller
{
    //
    public function userloginregister() {
        return view('users.login');
    }

    public function register(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();
            // echo $data; die;
            // check if user exists
            $userCount = User::where('email', $data['email-add'])->count();
            if($userCount > 0) {
                return back()->with('flash_message_error', 'Email account already exists');
            } else {
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email-add'];
                $user->password = bcrypt($data['password']);
                $user->save(); 
                if(Auth::attempt(['email'=>$data['email-add'],'password'=>$data['password']])) {
                    return redirect('/cart');
                }
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

    public function userlogout(){
        Auth::logout();
        return redirect('/');
    }
}
