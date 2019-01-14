<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function send(Request $request)  {
        $title = $request->input('title');
        $content = $request->input('content');

        \Mail::send('send', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('info@biofinder.ga', 'Shopade Damilola');

            $message->to('damilola@astract.com.ng');

        });


        return response()->json(['message' => 'Request completed']);
    }
}
