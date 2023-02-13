@extends('layouts.app')
@section('titulo')
        Inicio de sesion
@endsection

@section('contenido')
        <div class="md:flex md:justify-center md:gap-10 md:items-center">
            <div class="md:w-6/12 p-5 sm:mt-2">
                <img src="{{ asset('img/login.jpg') }}" alt="registerPhoto">
            </div>

            <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
                <form autocomplete="off" method="POST" novalidate>
                    @csrf
                    @if (session('mensaje'))  
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                    text-center">{{ session('mensaje') }}</p>                   
                    @endif
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
                        <input 
                            id="remember"
                            type="checkbox"
                            name="remember"
                        />
                        <label for="remember" class="text-gray-500 text-sm">Mantener mi sesion</label>
                    </div>

                    <input 
                        type="submit"
                        value="Login"
                        class="bg-green-600 hover:bg-green-700 transition-color cursor-pointer
                        uppercase font-bold w-full p-3 text-white rounded-lg"
                    />
                </form>
            </div>

        </div>
@endsection