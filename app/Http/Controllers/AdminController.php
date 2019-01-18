<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Order;
use App\OrderProduct;
use App\Bioproduct;
use App\Quote;
use App\Vendor;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
    	// if($request->isMethod('post')){
    	// 	$data = $request->input();
    	// 	 if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'admin' => '1'])) {
        //             //echo "Success"; die;
        //             Session::put('adminSession', $data['email']);
        //             return redirect('/admin/dashboard');
        // 	}else{
        //             //echo "failed"; die;
        //             return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
        // 	}
    	// }
        // return view('admin.admin_login');

        
        
        return redirect('/admin/dashboard');
    }

    public function dashboard(){
        /*if(Session::has('adminSession')){
            // Perform all actions
        }else{
            //return redirect()->action('AdminController@login')->with('flash_message_error', 'Please Login');
            return redirect('/admin')->with('flash_message_error','Please Login');
        }*/

        $orders = Order::where('status', 'New')->orderBy('created_at', 'DESC' )->paginate(5);
        foreach ($orders as $key) {
            $orderproducts = OrderProduct::where("order_id",$key->order_id)->get();
            $order = Order::where("order_id",$key->order_id)->get();
            
            foreach($orderproducts as $key) {
                $vendors = Bioproduct::where('id', $key->product_id)->get();
            }
            $userdetails = User::where('id', $key->user_id)->get();
        }
        $quotes = Quote::paginate(5);
        $vendors = Vendor::where('enable', 0)->paginate(5);
        return view('admin.dashboard')->with(compact('orders', 'quotes', 'vendors'));
    }

    public function settings(){

        $adminDetails = User::where(['id'=>1])->first();

        //echo "<pre>"; print_r($adminDetails); die;

        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        $current_password = $data['current_pwd'];
        $check_password = User::where(['id'=>'1'])->first();
            if (Hash::check($current_password, $check_password->password)) {
                //echo '{"valid":true}';die;
                echo "true"; die;
            } else {
                //echo '{"valid":false}';die;
                echo "false"; die;
            }

    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $check_password = User::where(['email'=>Auth::user()->email])->first();
            $current_password = $data['current_pwd'];

            if (Hash::check($current_password, $check_password->password)) {
                // here you know data is valid
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success', 'Password updated successfully.');
            }else{
                return redirect('/admin/settings')->with('flash_message_error', 'Current Password entered is incorrect.');
            }

            
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'Logged out successfully.');
       
    }
}
