<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Banner;
use App\Service;
use App\BioProduct;

class IndexController extends Controller
{
    public function index(){

    	// Get all Products
    	$productsAll = BioProduct::orderBy('created_at', 'desc')->where('status', 1 )->paginate(4);

		$banners = Banner::orderBy('created_at', 'desc')->where('status', 1 )->get();

		$services = Service::orderBy('created_at', 'desc')->paginate(4);

    	return view('index')->with(compact('productsAll', 'services', 'banners'));
    }
}
