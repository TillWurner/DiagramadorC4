<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();   //Mostrando todos los usuarios de la bd y almacenandolos en la variable users
        //return $users;
        return view('user.index', compact('users'));    //Compact para mandar los datos de users al index
    }
    public function delete($id)
    {
        //$user = User::where('id', $id);
        $user = User::findOrFail($id);
        $user->delete();
       // $id->delete();
        return redirect()->route('users');
        //return view('user.index', compact('users'));
        /*$users = User::where('id', $id)->get();
        $tipo = "Editar";
        return view('user.personal', compact('users'), compact('tipo'));*/
    }
    public function profile($id)
    {
        $users = User::findOrFail($id);
        //dd($users);
        return view('profile.index', compact('users'));
    }
    
}
