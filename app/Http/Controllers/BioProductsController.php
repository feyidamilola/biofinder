<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Auth;
use Session;
use Image;
use Cookie;

use App\SubCategories;
use App\ParentCategory;
use App\Vendor;
use App\BioProduct;
use App\User;
use App\Order;
use App\OrderProduct;


class BioProductsController extends Controller
{
    //
    public function createProduct(Request $request){
        if($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            if(empty($data['product_name'])) {
              return redirect()->back()->with('flash_message_error','Product name cannot be empty');
            } 
            if(empty($data['image'])) {
                return redirect()->back()->with('flash_message_error','Product images cannot be empty');
              } 
 
            $product = new BioProduct;
            $product->product_name = $data['product_name'];
            $product->category_name = $data['category_name'];
            $product->vendor_name = $data['vendor_name'];
            $product->price = $data['price'];
            $product->product_type = $data['product_type'];
            $product->product_application = $data['product_application'];
            $product->description = $data['description'];
            $product->specifications = $data['specifications'];
            $product->url = str_slug($data['product_name']);
            if(!empty($data['return_policy'])) {
                $product->return_policy = $data['return_policy'];
            } else {
                $product->return_policy = '';
            }

            if($request->hasFile('image')){
            	$image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/bioproducts/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/bioproducts/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/bioproducts/small'.'/'.$fileName;  

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

     				$product->image = $fileName; 

                }
            }
            
            if(empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

            $product->status = $status;
            $product->save();
            
            return back()->with('flash_message_success', 'Product has been created successsfully');
        }

        $categories = Subcategories::get();
        $vendors = Vendor::where('enable', 1)->get();

        return view('admin.bioproducts.create_bioproduct')->with(compact('categories','vendors'));
    }

    public function viewProducts(Request $request){
        $bioproducts = Bioproduct::get();
        $bioproducts = json_decode(json_encode($bioproducts));
        
        return view('admin.bioproducts.all_products')->with(compact('bioproducts'));
    }

    public function viewProductDetail($url = null){
        $productdetail = Bioproduct::where('url','=',$url)->get()->first();
        return view('admin.bioproducts.product_detail')->with(compact('productdetail'));
    }

    public function editBioProduct(Request $request, $url = null) {
        if($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
           
           // Upload Image
           if($request->hasFile('image')){
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;  
                $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;  

                Image::make($image_tmp)->save($large_image_path);
                 Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                 Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

            }
        }else if(!empty($data['current_image'])){
            $fileName = $data['current_image'];
        }else{
            $fileName = '';
        }

        if(empty($data['status'])) {
            $status = 0;
        } else {
            $status = 1;
        }
        
        
        Bioproduct::where(['url'=>$url])->update(['product_name'=>$data['product_name'],
                                        'category_name'=>$data['category_name'],
                                        'vendor_name'=>$data['vendor_name'],
                                        'price'=>$data['price'],
                                        'product_type'=>$data['product_type'],
                                        'product_application'=>$data['product_application'],
                                        'description'=>$data['description'],
                                        'specifications'=>$data['specifications'],
                                        'return_policy'=>$data['return_policy'],
                                        'image'=>$fileName,
                                        'status'=>$status]);
            
                                        // print_r($data); die;

            return redirect()->back()->with('flash_message_success', 'Product Successfully updated');
        }
        $productdetail = Bioproduct::where('url','=',$url)->get()->first();

        $categories = Subcategories::get();
        $vendors = Vendor::where('enable', 1)->get();
        return view('admin.bioproducts.edit_product')->with(compact('productdetail','categories','vendors'));
    }

    public function deleteProduct($id = null){
        BioProduct::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully');
    }

    public function deleteBioProductImage(Request $request, $id = null) {
        BioProduct::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success', 'Image has been deleted');
    }

    public function viewFrontendProducts(Request $request){
        $bioproducts = BioProduct::orderBy('created_at', 'desc')->where('status', 1 )->paginate(10);

        $vendors = Vendor::where('enable', 1)->get();
        $subcategories = SubCategories::get();

        // Price Filter
        $maxprice = $request->maxprice;
        $minprice = Bioproduct::min('price');

        if(request()->has('maxprice')) {
            $bioproducts = BioProduct::whereBetween('price', [$minprice, $maxprice])->paginate(10);
            return view('products.allproducts')->with(compact('bioproducts','subcategories','vendors', 'minprice'));
        }
        
        // Comparison
        $compares = $request->compares;
        if(request()->has('compares')) {
            $bioproducts = Bioproduct::get();
            $productdetails = [];
            //fetch products of the particular id
            foreach($compares as $compare){
                $productdetail = BioProduct::where('id' , $compare)->first();
                array_push($productdetails, $productdetail);
            }
            if(count($productdetails) > 3) {
               return back()->with('flash_message_error','You cannot compare more than 3 products');
            }

            return view('products.compare')->with(compact('productdetails'));
        }

        return view('products.allproducts')->with(compact('bioproducts', 'vendors', 'subcategories', 'highestprice', 'lowestprice', 'middleprice'));
    }

    public function viewFrontendProductDetail($url = null){
        // Redirect disabled products to 404
        $disabledproducts = Bioproduct::where(['url'=>$url, 'status'=>1])->count();
        if ($disabledproducts == 0) {
            abort(404);
        }
        $productdetail = Bioproduct::where('url','=',$url)->get()->first();
        $productcategory = $productdetail['category_name'];
        $similarproducts = Bioproduct::where('category_name', $productcategory)->take(4)->get();
        
        return view('products.productdetail')->with(compact('productdetail', 'similarproducts'));
    }

     //Fetch all subcategory products
    public function fetchProducts($url){
        $vendors = Vendor::where('enable', 1)->get();
        $subcategories = SubCategories::get();

        $category_name = SubCategories::where('url' , $url)->get(['category_name'])->first();
        $bioproducts = Bioproduct::where('category_name' , $category_name->category_name)->paginate(10);

        if(count($bioproducts) <= 0) {
            return back()->with('flash_message_error','No products found');
        }
        // echo $products;
        return view('products.allproducts')->with(compact('bioproducts', 'category_name', 'vendors', 'subcategories'));
    }

    public function allorders(Request $request){
        $orders = Order::orderBy('created_at', 'DESC' )->get();
        foreach ($orders as $key) {
            $orderproducts = OrderProduct::where("order_id",$key->order_id)->get();
            
            foreach($orderproducts as $key) {
                $vendors = Bioproduct::where('id', $key->product_id)->get();
            }
            $userdetails = User::where('id', $key->user_id)->get();
        }

        if($request->isMethod('post')) {
            $data = $request->all();

            $orderstatus = $data['order_status'];
            $order_id = $data['order_id'];
            
            OrderProduct::where(['order_id' => $order_id])->update(['status' => $orderstatus]);
            Order::where(['order_id' => $order_id])->update(['status' => $orderstatus]);

            // Email customer for order status update
            $orders = DB::table('orders')->where(['order_id' => $order_id])->first();
            $user_id = $orders->user_id;
            // echo '<pre>'; print_r($user_id); die;

            $userdetails = User::find($user_id);
            $orderproducts = DB::table('order_products')->where(['order_id' => $order_id])->get();
            $email = $userdetails->email;
 
            \Mail::send('emails.orderupdate', 
                        [
                            'userdetails' => $userdetails,
                            'orderproducts' => $orderproducts,
                            'orders' => $orders
                        ], 
                        function ($message) use($email)  {
                            $message->from('info@biofinder.ga', 'Order Update - Biofinder Plus Team');
                            $message->to($email);
                        });
                        
            return back()->with('flash_message_success', 'Your order has been updated');

        }
       
        return view('admin.bioproducts.all_orders')->with(compact('orders','orderproducts', 'userdetails','vendors'));
    }

    // Search
    public function Search(Request $request) {
        $q = Input::get('q');
        if ($q != "") {
            $products = BioProduct::where('product_name', 'LIKE', '%'.$q .'%' )
                                    ->orWhere('category_name', 'LIKE', '%'.$q .'%')
                                    ->orWhere('vendor_name', 'LIKE', '%'.$q .'%')
                                    ->orWhere('price', 'LIKE', '%'.$q .'%')
                                    ->orWhere('product_type', 'LIKE', '%'.$q .'%')
                                    ->orWhere('product_application', 'LIKE', '%'.$q .'%')
                                    ->orWhere('description', 'LIKE', '%'.$q .'%')
                                    ->orWhere('specifications', 'LIKE', '%'.$q .'%')
                                    ->orWhere('return_policy', 'LIKE', '%'.$q .'%')
                                    ->get();
            
            if(count($products) > 0) return view('products.search')->with(compact('products'));
        }
        return redirect()->back()->with('flash_message_error','No result found');
    }

    // add to cart
    public function AddtoCart(Request $request) {
        $data = $request->all();
        // echo print_r($data); die;
        
        if(empty($data['quantity'])) {
            return back()->with('flash_message_error','You did not enter the quantity you want');
        }

        if(empty($data['user_id'])) {
            $data['user_id'] = 0;
        }

        $session_id = Session::get('session_id');

        if(empty($session_id)) {
            $session_id = str_random(30);
            Session::put('session_id', $session_id);
        }

        $countProducts = DB::table('cart')->where(['product_id'=>$data['product_id'],
                                                    'product_name'=>$data['product_name'],
                                                    'session_id'=>$session_id
                                                    ])->count();
        
        if($countProducts > 0) {
            return back()->with('flash_message_error','Product already exists in your cart');
        } else {
            DB::table('cart')->insert(['product_id'=>$data['product_id'],
                                  'product_name'=>$data['product_name'],
                                  'session_id'=>$session_id,
                                  'user_id'=>$data['user_id'],
                                  'quantity'=>$data['quantity'],
                                  'price'=>$data['price']
                                  ]);
        }

        
        
        return back()->with('flash_message_success','Product has been added to cart');
    }

    // View Cart
    public function Cart() {
        // $session_id = $_COOKIE['session_id'];
        
        $session_id = Session::get('session_id');
        $usercart = DB::table('cart')->where(['session_id' => $session_id])->get();
        
        foreach($usercart as $key => $product) {
            // echo $product->product_id; die;
            $productdetails = BioProduct::where('id', $product->product_id)->first();
            $usercart[$key]->image = $productdetails->image;
            
        }
        return view('products.cart')->with(compact('usercart'));
    }

    public function deleteCartitem($id = null) {
        DB::table('cart')->where('id', $id)->delete();

        return redirect()->back()->with('flash_message_success','Product has been removed from your cart');
    }

    // update cart quantity
    public function UpdateCartQuantity($id = null, $quantity = null) {
        DB::table('cart')->where('id', $id)->increment('quantity', $quantity);
        return back()->with('flash_message_success', 'Product quantity has been updated');
    }
    
    public function checkout(Request $request) {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
       
        $userDetails = User::find($user_id);
        
        $session_id = Session::get('session_id');

        $usercart = DB::table('cart')->where(['user_id' => $user_id])->get();
       
        foreach($usercart as $key => $product) {
            $productdetails = BioProduct::where('id', $product->product_id)->first();
            $usercart[$key]->image = $productdetails->image;            
        }

        DB::table('cart')->where(['session_id'=>$session_id])->update(['user_id'=> $user_id]);

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

            if(empty($data['additional_info'])) {
                $additional_info = '';
            } else {
                $additional_info = $data['additional_info'];
            }

            if($data['delivery'] == 'shipping') {
                $totalamount = $data['totalamount'] + 1500;
            } else {
                $totalamount = $data['totalamount'];
            }

            $order_id = str_random(10);
            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->payment = $data['payment'];
            $order->delivery = $data['delivery']; 
            $order->totalamount = $totalamount;
            $order->status = "New";
            $order->order_id = $order_id;
            $order->additional_info = $additional_info;

            // DB::table('users')->where(['user_id'=>$user_id])->update([
            //     'name'=> $user_id
            //     ]);

            $order->save();

            
            
            $cartProducts = DB::table('cart')->where(['user_id' => $user_id])->get();
            foreach ($cartProducts as $cartProduct) {
                $cartProductOrder = new OrderProduct;
                $cartProductOrder->order_id = $order_id;
                $cartProductOrder->user_id = $user_id;
                $cartProductOrder->product_id = $cartProduct->product_id;
                $cartProductOrder->product_name = $cartProduct->product_name;
                $cartProductOrder->product_price = $cartProduct->price * $cartProduct->quantity;
                $cartProductOrder->product_qty = $cartProduct->quantity;
                $cartProductOrder->status = "New";
                $cartProductOrder->save();

                Session::put('order_id', $order_id);
            }

            // Email User upon completion of order
            $order_id = Session::get('order_id');
            $orders = DB::table('orders')->where(['order_id' => $order_id])->get();
            $user_id = Auth::user()->id;
            $userdetails = User::find($user_id);
            $orderproducts = DB::table('order_products')->where(['order_id' => $order_id])->get();
            $email = $userdetails->email;

            \Mail::send('emails.order', 
                        [
                            'userdetails' => $userdetails,
                            'orderproducts' => $orderproducts,
                            'orders' => $order
                        ], 
                        function ($message) use($email)  {
                            $message->from('info@biofinder.ga', 'Biofinder Plus Team');
                            $message->to($email);
                        });

            return redirect()->action('BioProductsController@OrderReview');
        }

        return view('users.checkout')->with(compact('userDetails', 'usercart'));
    }

    public function OrderReview(Request $request) {
        $user_id = Auth::user()->id;
        $userDetails = User::where('id', $user_id)->first();
        $userDetails = json_decode(json_encode($userDetails));
        $orderDetails = Order::where('user_id', $user_id)->first();

        $usercart = DB::table('cart')->where(['user_id' => $user_id])->get();

        foreach($usercart as $key => $product) {
            $productdetails = BioProduct::where('id', $product->product_id)->first();
            $usercart[$key]->image = $productdetails->image;            
        }

        return view('products.review')->with(compact('userDetails', 'orderDetails', 'usercart'));
    }

    public function Thankyou(Request $request) {
        $user_id = Auth::User()->id;
        DB::table('cart')->where(['user_id' => $user_id])->delete();
        return view('products.thankyou');
    }

    
}

