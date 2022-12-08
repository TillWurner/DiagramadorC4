<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XmlController extends Controller
{
    public function downloads(){
        $path=public_path('diagramas.xml');
        return response()->download($path);
    }
}
