<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function index() {
        return view('auth.register');
    }

    public function store(Request $request)
    {

    $request->request->add(['username' => Str::slug($request->username)]);
       //Validacion
      $this->validate($request, [

            'name'=>'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
            
        ]);
    
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //autentificar usuario 
        auth()->attempt($request->only('email','password'));

        //redireccion si registro exitoso
        return redirect()->route('posts.index', auth()->user()->username);
    }
}