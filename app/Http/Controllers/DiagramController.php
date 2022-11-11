<?php

namespace App\Http\Controllers;
use App\Models\Diagramas;
use Illuminate\Http\Request;

class DiagramController extends Controller
{
    public function mydiagrams()
    {
        $diagramas = Diagramas::all(); 
        //return view('diagrams.diagrams2');
        return view('diagrams.diagrams', compact('diagramas'));
    }
    public function creatediagram(){
        return view('diagramslayout.diagram2');
    }
    public function shdiagrams()
    {
        return view('diagrams.shdiagrams');
    }
    public function create()
    {

    }

    public function GuardarDiagrama($DATA)
    {
        
    }
}
