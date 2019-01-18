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
            
            // Email user for new quote
            $email = $request->input('email');
            $product_name = $request->input('product_name');
            $category = $request->input('category');

            \Mail::send('emails.quote', 
                        [
                            'product_name' => $product_name,
                            'category' => $category
                        ], 
                        function ($message) use($email)  {
                            $message->from('info@biofinder.ga', 'Biofinder Plus Team');
                            $message->to($email);
                        });

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
