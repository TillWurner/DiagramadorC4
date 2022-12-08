<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function download(){
        $path=public_path('diagramas.json');
        return response()->download($path);
    }
}
