@extends('layouts.app')

@section('titulo')
        {{ $posts->titulo }}
@endsection


@section('contenido')

        <div class="flex justify-center items-center">
            <div class="w-full container gap-2 md:flex">
                <div class="md:w-8/12 lg:w-8/12 px-5">
                     <img src="{{ asset('uploads') . '/' . $posts->imagen }}" class="p-6" alt="imagen post {{ $posts->titulo }}">
                     <div class="p-3 text-md text-gray-800 mx-4 font-bold text-2lg">
                                {{ $posts->descripcion }}
                         <p class="text-gray-500 my-1 text-sm"> {{ $posts->created_at->diffForHumans() }}</p>
                     </div>
                     @auth
                     <div class="container mx-auto p-5 border-b bg-white rounded shadow-lg flex justify-start items-center">
                         <livewire:like-post :posts="$posts"/>
                            <div class="w-1/2 p-2">
                                <button disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                    </svg>                                        
                                </button>
                                <p class="font-bold text-2lg mx-3">{{ $posts->comentarios->count() }}</p>
                            </div>
                            @if ($posts->user_id === auth()->user()->id)   
                           <form method="POST" action="{{ route('posts.destroy', $posts) }}" autocomplete="off" novalidate>
                               @method('DELETE')
                               @csrf
                                <div class="p-2 mx-5">
                                    <button
                                    type="submit" 
                                    class="bg-red-400
                                    hover:bg-red-600 text-white rounded-lg p-2 mt-4 font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                                      
                                    </button>
                                </div>
                           </form>
                           @endif
                        </div>
                    @endauth
                    @guest
                    <div class="container mx-auto p-5 border-b bg-white rounded shadow-lg flex justify-start items-center">
                        <div class="p-2 mx-5">
                                <button disabled>
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                 </svg>                                  
                                </button>
                                <p class="font-bold text-2lg mx-3">{{ $posts->like->count() }}</p>
                        </div>  
                        <div class="p-2 w-full">
                            <button disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                </svg>                                        
                            </button>
                            <p class="font-bold text-2lg mx-3">{{ $posts->comentarios->count() }}</p>
                        </div>
                    </div>
                    <div class="p-3 w-max-96 mx-5 my-2">
                        <span class="mx-6 bg-blue-600 text-white p-3 mt-4 rounded-lg w-1/2">Inicia sesion para interactuar con esta cuenta</span>
                    </div>
                    @endguest
                </div>
                <div class="md:w-8/12 lg:w-8/12 px-5 sm:mt-3 md:mt-3 lg:mt-0 xl:mt-0 bg-white rounded-lg my-3">
                        <div class="w-full container mx-auto bg-white rounded-lg shadow-lg">
                                <div class="p-4 container mx-6 border-gray-400 flex">
                                    <div class="mx-2 rounded-full">
                                        <img src="{{ $posts->user->imagenPerfil ? asset('uploads/profile' . '/' . $posts->user->imagenPerfil) : asset('img/userProfileDefault.png') }}"  class="rounded-full" width="60" alt="perfil {{ $posts->user->username }}">
                                    </div>
                                    <div class="md:w-1/2">
                                        <h3 class="text-bold mt-3 mx-1 text-md">
                                            <a href="{{ route('posts.index', $posts->user) }}" class="font-bold">
                                                {{ $posts->user->username }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                        </div>
                        <p class="font-bold text-2xl my-4 text-gray-600 text-center">
                            Comentarios
                        </p>   
                        @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{session('mensaje')}}
                        </div>
                        @endif
                        <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll overflow-x-hidden mt-10">
                            @if ($posts->comentarios->count())
                             @foreach ($posts->comentarios as $comentario )    
                                <div class="p-5 border-gray-300 border-b mt-2">
                                    <div class="container mx-6 border-gray-400 flex">
                                        <div class="container border-gray-400 flex">
                                            <div class="mx-3 my-5">
                                                <img src="{{ $comentario->user->imagenPerfil ? asset('uploads/profile' . '/' . $comentario->user->imagenPerfil) : asset('img/userProfileDefault.png') }}"  class="rounded-full" width="90" alt="perfil {{ $posts->user->username }}">
                                            </div>
                                            <div class="mx-2 my-5 w-full">
                                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                                    {{ $comentario->user->username }}
                                                </a>
                                                <p>{{ $comentario->comentario}}</p>
                                                <p class="text-sm text-gray-500">{{
                                                    $comentario->created_at->diffForHumans()    
                                                }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             @endforeach
                            @else
                                <p class="p-10 text-center">No hay comentarios</p>
                            @endif
                        </div>
                        <div class="bg-white my-6 rounded-lg shadow-lg p-2 mb-5 container w-full mx-auto justify-center">
                                <form action="{{ route('comentario.store', ['posts' => $posts, 'user' => $user->username]) }}" method="POST" autocomplete="off" novalidate>
                                    @csrf
                                    <div class="w-full container mx-auto">
                                        <div class="p-4 container border-gray-400 flex">
                                            @auth        
                                            <div class="w-full">
                                                <input 
                                                        type="text"
                                                        name="comentario"
                                                        id="comentario"
                                                        class="border hover:border-blue-500 text-sm w-full rounded-full my-4 p-2"
                                                        placeholder="Escribe tu comentario"
                                                        
                                                />
                                                @error('comentario')
                                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                                                text-center">{{ $message }}</p>
                                                @enderror   
                                            </div>
                                            <div class="my-5 text-gray-500 hover:text-gray-600">
                                                <button type="submit">         
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                                   </svg> 
                                                </button>
                                            </div>
                                            @endauth

                                            @guest
                                            <div class="w-16 text-gray-600 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                                  </svg>             
                                            </div>
                                            <div class="font-bold text-3lg text-sm text-gray-600 text-center">
                                                <p class="my-2">
                                                    inicia sesion o registrate para unirte a la conversacion
                                                </p>
                                            </div>
                                            @endguest
                                        </div>
                                </div>
                                </form>
                        </div>
                </div>
            </div>
        </div>
@endsection     