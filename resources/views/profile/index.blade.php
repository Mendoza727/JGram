@extends('layouts.app')

@section('titulo')
Edita tu perfil - {{ auth()->user()->username }}
@endsection


@section('contenido')

<div class="flex justify-center items-center">
    <div class="w-full gap-2 md:flex">
        <div class="md:w-1/2 lg:w-3/6 px-5">
            <p class="font-bold p-2">Vista Previa</p>
            <div class="font-black leading-tight bg-grey-lighter p-1">
                <div class="mx-auto bg-white rounded-lg shadow-xl">
                    <div class="bg-cover h-40 rounded-t-lg" style="background-image: url({{ auth()->user()->imagenBanner ? asset('uploads/banner') . '/' . auth()->user()->imagenBanner : asset('img/defaultBanner.png' ) }})">
                    </div>
                    <div class="border-b px-4 pb-6">
                        <div class="text-center sm:text-left sm:flex mb-4">
                            <img class="h-32 w-32 rounded-full border-4 border-white -mt-16 mr-4"
                                src="{{ auth()->user()->imagenPerfil ? asset('uploads/profile') . '/' . auth()->user()->imagenPerfil : asset('img/userProfileDefault.png' ) }}" alt="profile">
                            <div class="py-2">
                                <h3 class="font-bold text-2xl mb-1">{{ '@'.auth()->user()->username }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:w-1/2 lg:w-3/6 my-3 items-center p-3 bg-white rounded-lg shadow">
            <form method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10" autocomplete="off">
                @csrf
                <div class="mt-2 py-4 mx-4">
                    <label for="username" class="mb-2 block uppercase text-gray-500  font-bold">Nombre usuario</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Ingresa tu nuevo nombre de usuario"
                        class="border p-3 w-full rounded-lg"
                        value="{{ auth()->user()->username }}"
                        />
                </div>
                <div class="mb-5 px-5">
                    <label class="font-bold mb-2 block text-gray-500 text-sm">Imagen Perfil</label>
                    {{-- <label for="imagenPerfil" class="border-dashed border-2 w-full h-44 
                    rounded flex flex-col justify-center items-center cursor-pointer">
                        <div class="items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg> 
                        </div>
                    </label> --}}
                <input 
                    type="file" 
                    name="imagenPerfil" 
                    id="imagenPerfil"
                    accept=".png, .jpg, .jpeg"
                    class="border p-3 w-full rounded-lg"
                />
                </div>
                <div class="mb-5 px-5">
                    <label class="font-bold mb-2 block text-gray-500 text-sm"> Imagen Banner</label>
                    {{-- <label for="imagenBanner" class="border-dashed border-2 w-full h-44 
                    rounded flex flex-col justify-center items-center cursor-pointer">
                        <div class="items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>                                      
                        </div>
                    </label> --}}
                <input 
                    type="file" 
                    name="imagenBanner" 
                    id="imagenBanner"
                    accept=".png, .jpg, .jpeg"
                    class="border p-3 w-full rounded-lg"
                />
                </div>
                <input type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white transition-color cursor-pointer my-3
                   uppercase font-bold w-full p-3 rounded-lg" value="Actualizar" />
                </div>
            </form>
    </div>
</div>

@endsection