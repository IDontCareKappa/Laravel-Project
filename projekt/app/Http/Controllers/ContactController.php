<?php

namespace App\Http\Controllers;

class ContactController extends \Illuminate\Routing\Controller
{
    public function index(){
        return view('contact');
    }
}
