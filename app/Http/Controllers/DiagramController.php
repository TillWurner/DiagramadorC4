<?php

namespace App\Http\Controllers;
use App\Models\Diagramas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\VoidType;

class DiagramController extends Controller
{
    public function existeDiag()
    {
        $idAuth = Auth()->user()->id;
        $bandera = 0;
        $diagramas = Diagramas::all();
        foreach($diagramas as $diagram){
            if($diagram->id_user == $idAuth){
                $bandera = 1;
            }
        }
        return $bandera;
    }
    public function mydiagrams()
    {
        $exist = $this->existeDiag();
        $idAuth = Auth()->user()->id;
        /* $idAuth = $id; */
        $diagramas = Diagramas::all(); 
        //return view('diagrams.diagrams2');
        /* return view('diagramslayout.diagram', compact('diagramas','idAuth','exist')); */
        return view('diagrams.diagrams', compact('diagramas','idAuth','exist'));
    }
    public function store(Request $request){
        function claveOne($length = 7){
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
        $auth=auth()->user()->id;
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
        /* $auth=auth()->user()->id; */
        $diagramas = Diagramas::findOrFail($id);
        $diagramas->delete();
       // $id->delete();
        return redirect()->route('mydiagrams');   
    }
    public function diag($id){

        /* $diagram = Diagramas::findOrFail($id) */;
        $user = Auth()->user()->id;
        $diagramas = Diagramas::findOrFail($id);
        $autor = $diagramas->id_user;
        $codigo = $diagramas->code;
        $diagramas->json;
        $var = $diagramas->json;
        return view('diagramslayout\diagramgen', compact('id','var','user','autor','codigo'));
    }
    public function sharediag(Request $request){
        $inv = $request->input('code');
        $diagramas = Diagramas::all(); 
        return view('diagrams.shdiagrams', compact('inv', 'diagramas'));
    }
    public function shdiagrams()
    {
        $inv = 0;
        /* return view('diagrams.menu'); */
        return view('diagrams.shdiagrams', compact('inv'));
    }
    /* public function loaddiag($id, Request $request)
    {
        $diagramas = Diagramas::findOrFail($id);
        $diagramas->json;
        $var = $diagramas->json;
        return view('diagramslayout\diagramgen', ['var' => $var]);
    } */
    public function savediag($id, Request $request)
    {
        /* $data = request()->all(); */
         $diagramas = Diagramas::findOrFail($id);
         $diagramas->json = $request->input('json');
        /* $credentials = Request()->validate([
            'json' => ['required'],
        ]); */

         $diagramas->save();
        /* return $request->input('json'); */
        /* return $request->input('json'); */
        return redirect()->route('mydiagrams');

        /*  $diagram=Diagramas::findOrFail($id);
        $auth = $diagram -> id_user;
        $me = Auth()->user()->id;
        if($auth == $me){
            return 0;
        } 
        $prueba = 0;
        $diagram=Diagramas::findOrFail($id);
        $auth = $diagram -> id_user;
        $idAuth = Auth()->user()->id;
            if($auth == $idAuth){
                  return $prueba = 1 ;
            }
        return  $prueba; 
        $prueba = 0;
        $diagram=$this->diagram->id;
        $auth = $diagram -> id_user;
        $idAuth = Auth()->user()->id;
        
            if($auth == $idAuth){
                $prueba = 1;
            }
        return $prueba; */
    }
}
