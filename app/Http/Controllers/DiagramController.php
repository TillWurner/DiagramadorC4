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
    
    public function store(Request $request){
       
        function claveOne($length = 4){
            return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x))  )),1,$length);
    
        }
        $clave = claveOne();

        $credentials = Request()->validate([
            'nombre' => ['required'],
            'descripcion' => ['required'],
        ]);

        $diagramas = Diagramas::create([
            'id_user' => auth()->user()->id,
            'nom' => request('nombre'),
            'desc' => request('descripcion'),
            'code' => $clave,
            'json' => request('json')
        ]);
        /* $diagramas = new Diagramas();

        $diagramas->nom = $request->get('name');
        $diagramas->desc = $request->get('desc');
        $diagramas->id_user = auth()->user()->id;
        $diagramas->save(); */
        return redirect()->route('mydiagrams');
    }
    public function creatediagram(){
        return view('diagramslayout.diagram2');
    }
    public function shdiagrams()
    {
        return view('diagrams.menu');
    }
    public function create()
    {

    }

    public function GuardarDiagrama($DATA)
    {
        
    }
}
