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
        //return view('user.index', compact('users'));
        /*$users = User::where('id', $id)->get();
        $tipo = "Editar";
        return view('user.personal', compact('users'), compact('tipo'));*/
    }
    public function diag($id){

        /* $diagram = Diagramas::findOrFail($id) */;
        return view('diagramslayout\diagramgen', compact('id'));
    }
    public function shdiagrams()
    {
        /* return view('diagrams.menu'); */
        return view('diagramslayout.diagram2');
    }
    public function savediag(Diagramas $id, $content)
    {
        $diagramas = Diagramas::findOrFail($id);
        $credentials = Request()->validate([
            'json' => ['required'],
        ]);

        $diagramas->update($content);

        return view('diagramslayout\diagramgen', compact('id'));

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
