<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;

use App\User;
use App\Order;
use App\OrderProduct;

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
                $user->address = '';
                $user->state = '';
                $user->phone = '';

                $user->password = bcrypt($data['password']);
                $user->save(); 

                if(Auth::attempt(['email'=>$data['email-add'],'password'=>$data['password']])) {
                    Session::put('frontSession', $data['email-add']);

                    // Email user upon signup

                    $title = $request->input('title');
                    $username = $request->input('name');
                    $content = $request->input('content');
                    $email = $request->input('email-add');

                    \Mail::send('emails.new', 
                                [
                                    'title' => 'New User Registration', 
                                    'username' => $username,
                                    'content' => 'Thank you for signing up on our platform.'
                                ], 
                                function ($message) use($email)  {
                                    $message->from('info@biofinder.ga', 'Biofinder Plus Team');
                                    $message->to($email);
                                });
                    
                    return redirect('/profile');
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

    public function userlogin(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();

            if(Auth::attempt(['email' =>$data['email'], 'password' => $data['password1']])) {
                Session::put('frontSession', $data['email']);
                return redirect('/profile');
            } else {
                return back()->with('flash_message_error', 'Invalid Email Address or Password');
            }
        }
    }

    public function userProfile(Request $request) {
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);

        if($request->isMethod('post')) {
            $data = $request->all();

            if(empty($data['name'])) {
                return back()->with('flash_message_error', 'Your name cannot be empty');
            }
            if(empty($data['email'])) {
                return back()->with('flash_message_error', 'Your email cannot be empty');
            }
            if(empty($data['phone'])) {
                return back()->with('flash_message_error', 'Your phone number cannot be empty');
            }
            if(empty($data['address'])) {
                return back()->with('flash_message_error', 'Your address cannot be empty');
            }
            if(empty($data['state'])) {
                return back()->with('flash_message_error', 'Your state cannot be empty');
            }
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->address = $data['address'];
            $user->state = $data['state'];
            $user->save();
            
            return back()->with('flash_message_success', 'Your details have been updated');
        }
        // echo "<pre>"; print_r($userDetails); die;
        return view('users.profile')->with(compact('userDetails'));
    }

    public function updatePassword(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();

            $oldpassword = User::where('id', Auth::User()->id)->first();
            $currentpassword = $data['currentpassword'];
            if(Hash::check($currentpassword, $oldpassword->password)) {
                $password = bcrypt($data['password']);
                User::where('id', Auth::User()->id)->update(['password'=>$password]);
                return back()->with('flash_message_success', 'Password has been successfully changed');
            } else {
                return back()->with('flash_message_error', 'Current Password is incorrect');
            }
        }
        return view('/users.password');
    }

    public function userOrders() {
        $user_id = Auth::user()->id;
        $orderproducts = OrderProduct::where(['user_id' => $user_id])->get();

        // $orderproducts = OrderProduct::get();
        $orderproducts = json_decode(json_encode($orderproducts));
        // echo "<pre>"; print_r($orderproducts); die;
        
        return view('users.orders')->with(compact('orderproducts'));
    }

    public function userlogout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/');
    }
}
