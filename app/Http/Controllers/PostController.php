<?php

namespace App\Http\Controllers;
use Mail;

use Illuminate\Http\Request;
use App\Post;
use App\Website;
use App\Mail\SendEmailTest;
use App\Jobs\SendEmailJob;

class PostController extends Controller
{


public function createWebsite(Request $request){

    $validated = $request->validate([
        'name' => 'required',
    ]);

//for creation of more websites
    $createWebsite = Website::create($request->all());
    return redirect()->route('website.list')->with('message','Success, your website has been successfully created');

}






public function post(Request $request){


    $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

//here I am creating the post
    $post = Post::create($request->all());


//here the model relationship is searching for the $website_id as a foreign key.
    $website_id = $request->website_id;
    $subscriber = Website::find($website_id);
    $allSubscribers = $subscriber->subscribers;


//All emails which subscribed to a specific website are in $email_details
 $email_details = $allSubscribers;


if(count($email_details)>0){
 $this->dispatch(new SendEmailJob($email_details,$request->title,$request->description));
}else{

 return redirect()->route('website.list')->with('message','Success, your post has been submitted to the website');


}

return redirect()->route('website.list')->with('message','Success, your post has been submitted to the website');





}



}


