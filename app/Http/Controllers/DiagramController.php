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
    public function delete($id)
    {
        //$user = User::where('id', $id);
        $diagramas = Diagramas::findOrFail($id);
        $diagramas->delete();
       // $id->delete();
        return redirect()->route('mydiagrams');
        //return view('user.index', compact('users'));
        /*$users = User::where('id', $id)->get();
        $tipo = "Editar";
        return view('user.personal', compact('users'), compact('tipo'));*/
    }
    public function creatediagram(){
        return view('diagramslayout.diagram2');
    }
    public function shdiagrams()
    {
        return view('diagrams.menu');
    }
    public function GuardarDiagrama($DATA)
    {
        
    }
}
