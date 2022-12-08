<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function download(){
        $path=base_path('diagram.json');
        echo "<script>console.log({$path})</script>";
        return response()->download($path);
    }
}
