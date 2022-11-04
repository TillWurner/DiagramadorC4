<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contactus()
    {
        return view('contactus');
    }
}
