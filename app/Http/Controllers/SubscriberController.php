<?php

namespace App\Http\Controllers;
use Mail;

use Illuminate\Http\Request;
use App\Subscribers;
use App\Website;

class SubscriberController extends Controller
{


    public function subscribe(Request $request){


        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        $subscriber = Subscribers::create($request->all());

        return redirect()->route('website.list')->with('message','hurrah!, you subscribed successfully');



    }










//this is only for testing purposes
    // public function basic_email() {

        // $data = array('name'=>"Subscription System");

        // Mail::send('mail', $data, function($message) {
        //    $message->to('baidar.sabaoon@gmail.com')->subject
        //       ('Message from Subscription System');
        //    $message->from('xyz@gmail.com','Subscription System');
        // });

        // echo "Basic Email Sent. Check your inbox.";

    // }



}
