<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {   
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => [
                'unique:users,username,'.auth()->user()->id,
                'min:3',
                'max:20',
                'not_in:twitter,editar-perfil'
            ],
        ]);

        if($request->imagenPerfil) {

                $imagenPerfil = $request->file('imagenPerfil');
                $nombreImagenPerfil = Str::uuid() . "." . $imagenPerfil->extension();
                $imagenServidor = Image::make($imagenPerfil);
                $imagenServidor->fit(1000, 1000);
                $imagenPathPerfil = public_path('uploads/profile') . '/' . $nombreImagenPerfil;
                $imagenServidor->save($imagenPathPerfil);

        }

        if($request->imagenBanner){

                $imagenBanner = $request->file('imagenBanner');
                $nombreImagenBanner = Str::uuid() . "." . $imagenBanner->extension();
                $imagenServidor2 = Image::make($imagenBanner);
                $imagenPathBanner = public_path('uploads/banner') . '/' . $nombreImagenBanner;
                $imagenServidor2->save($imagenPathBanner);
        }

        //Guardar Cambios

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username ?? auth()->user()->username ?? null;
        $usuario->imagenPerfil = $nombreImagenPerfil ?? auth()->user()->imagenPerfil ?? null;
        $usuario->imagenBanner = $nombreImagenBanner ?? auth()->user()->imagenBanner ?? null;
        $usuario->save();

        //Redireccionamos al usuario
        return redirect()->route('posts.index', $usuario->username);
    }
}
