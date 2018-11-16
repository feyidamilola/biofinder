<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Quote;

class QuotesController extends Controller
{
    //
    public function newQuote(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();
            
            $quote = new Quote;
            $quote->product_name = $data['product_name'];
            $quote->category = $data['category'];
            $quote->email = $data['email'];
            $quote->save();
            
            return back()->with('flash_message_success', 'Quote will be sent to your email');
        }

        return view('layouts.admin_header');
    }

    public function allQuotes()   {
        $quotes = Quote::get();

        return view('admin.quotes')->with(compact('quotes'));
    }
}
