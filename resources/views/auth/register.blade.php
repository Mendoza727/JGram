@extends('layouts.app')
@section('titulo')
        Registrate Aqui!!!
@endsection

@section('contenido')
        <div class="md:flex md:justify-center md:gap-10 md:items-center">
            <div class="md:w-6/12 p-5 sm:mt-2">
                <img src="{{ asset('img/registrar.jpg') }}" alt="registerPhoto">
            </div>

            <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
                <form action="{{ route('register') }}" method="POST" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="mb-2 block uppercase text-gray-500  font-bold">
                            Nombres
                        </label>
                        <input 
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Ingresa tu nombre completo"
                            class="border p-3 w-full rounded-lg @error('name') border-red-500 
                            @enderror"
                            value="{{ old('name') }}"
                            />

                        @error('name')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                            text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="username" class="mb-2 block uppercase text-gray-500  font-bold">
                            Nombre De usuario
                        </label>
                        <input 
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Ingresa tu usuario"
                            class="border p-3 w-full rounded-lg @error('username') border-red-500
                            @enderror"
                            value="{{ old('username') }}"
                            />

                        @error('username')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                            text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="email" class="mb-2 block uppercase text-gray-500  font-bold">
                            Correo
                        </label>
                        <input 
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Ingresa tu correo"
                            class="border p-3 w-full rounded-lg @error('email') border-red-500     
                            @enderror"
                            value="{{ old('email') }}"
                            />

                        @error('email')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                            text-center">{{ $message }}</p>
                        @enderror  
                    </div>

                    <div class="mb-5">
                        <label for="pass" class="mb-2 block uppercase text-gray-500 font-bold">
                            Contraseña
                        </label>
                        <input 
                            type="password"
                            id="pass"
                            name="password"
                            placeholder="Ingresa tu contraseña"
                            class="border p-3 w-full rounded-lg @error('password') border-red-500
                            @enderror"
                            />
                        @error('password')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                            text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="pass_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                            Repite Tu Contraseña
                        </label>
                        <input 
                            type="password"
                            id="pass_confirmation"
                            name="password_confirmation"
                            placeholder="Repite tu contraseña"
                            class="border p-3 w-full rounded-lg"
                            />
                    </div>

                    <input 
                        type="submit"
                        value="Register Account"
                        class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer
                        uppercase font-bold w-full p-3 text-white rounded-lg"
                    />

                </form>
            </div>

        </div>
@endsection