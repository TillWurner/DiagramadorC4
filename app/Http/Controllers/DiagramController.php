<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagramController extends Controller
{
    public function mydiagrams()
    {
        return view('diagrams.diagrams');
    }
    public function shdiagrams()
    {
        return view('diagrams.shdiagrams');
    }
}
