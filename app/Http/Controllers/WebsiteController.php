<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Website;

class WebsiteController extends Controller
{

public function websitesList(){

    $list = Website::all();

    return View('Welcome',compact('list'));

    }







}
