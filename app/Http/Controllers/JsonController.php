<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function download(){
       /*  $path=public_path('diagram.json'); */
        return response()->download('diagram.json');
    }
}
