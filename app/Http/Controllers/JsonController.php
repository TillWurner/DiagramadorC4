<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function download(){
        $path=public_path('diagramas.json');
        return response()->download($path);
    }
    public function downloads(){
        $path=public_path('diagramas.xml');
        return response()->download($path);
    }
    public function importjson(Request $req){

        /** prueba **/
        /* chdir(public_path()); //Direcionar el archivo a descargar
          $file_name = 'diagramas.xml';
          file_put_contents($file_name, $var); */

       /*  $inv = $req->input('file'); */
        $doc = file_get_contents($req->input('file'));
        return $doc;
    }
}
