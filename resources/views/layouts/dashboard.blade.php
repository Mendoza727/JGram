@extends('layouts.app')

@section('titulo')
    Perfil
@endsection

@section('contenido')

<div class="flex justify-center items-center">
    <div class="w-full container gap-2 md:flex">
            <div class="md:w-8/12 lg:w-8/12 px-5">
               <div class="font-black leading-tight bg-grey-lighter p-1">
                    <div class="mx-auto bg-white rounded-lg shadow-xl">
                        <div class="bg-cover h-40 rounded-t-lg" style="background-image: url({{ $user->imagenBanner ? asset('uploads/banner' . '/' . $user->imagenBanner ) : asset('img/defaultBanner.png') }})"></div>
                        <div class="border-b px-4 pb-6">
                            <div class="container text-center sm:text-left sm:flex mb-4">
                                <img class="h-32 w-32 rounded-full border-4 border-white -mt-16 mr-4" src="{{ $user->imagenPerfil ? asset('uploads/profile' . '/' . $user->imagenPerfil) : asset('img/userProfileDefault.png') }}" alt="profile">
                                <div class="py-2">
                                    <h3 class="font-bold text-2xl mb-1">{{ '@'.$user->username }}</h3>
                                    @auth   
                                    @if ($user->id !== auth()->user()->id)
                                        @if (!$user->follows( auth()->user()))
                                          <form action="{{ route('users.follow', $user->username) }}" method="POST">
                                             @csrf
                                             <input 
                                             type="submit" 
                                             class="bg-blue-500 hover:bg-blue-600 text-white transition-color cursor-pointer my-3
                                             uppercase font-bold w-full p-3 rounded-lg" 
                                             value="Follow" />
                                           </form>
                                           @else
                                           <form action="{{ route('users.unfollow', $user->username) }}" method="POST">
                                               @method('DELETE')
                                               @csrf
                                               <input type="submit" 
                                               class="bg-red-500 hover:bg-red-600 text-white transition-color cursor-pointer my-3
                                               uppercase font-bold w-full p-3 rounded-lg" 
                                               value="Unfollow" />
                                           </form>
                                        @endif 
                                    @endif
                                    @endauth
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
               </div>
            </div>
        <div class="md:w-3/12 lg:w-3/12 px-5 sm:w-12/12 my-3 items-center">
            <div class="mx-auto bg-white rounded-lg shadow-lg">
                <div class="mt-2 py-4 mx-4">
                    <div class="text-grey-darker mb-4 flex items-cente">
                        <svg class="h-6 w-6 text-grey mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"/></svg>
                        <span class="text-md text-gray-500"><strong class="text-gray-500">{{ $user->following->count() }}</strong>&nbsp;Seguidos</span>
                    </div>
                </div>
            </div>
            <div class="mx-auto bg-white rounded-lg shadow-lg">
                <div class="mt-2 py-4 mx-4">
                    <div class="flex items-center text-grey-darker mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>&NonBreakingSpace;                 
                        <span class="text-md text-gray-500"><strong class="text-gray-500">{{ $user->followers->count() }}</strong>&nbsp;@choice('Seguidor|Seguidores', $user->followers->count())</span>
                    </div>
                </div>
            </div>
            <div class="mx-auto bg-white rounded-lg shadow-lg">
                <div class="mt-2 py-4 mx-4">
                    <div class="flex items-center text-grey-darker mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                          </svg>&NonBreakingSpace;                          
                        <span class="text-md text-gray-500"><strong class="text-gray-500">{{ $user->posts->count() }}</strong>&nbsp;@choice('Publicación|Publicaciones', $user->posts->count())</span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
    @if ($posts->count())    
        <div class="mx-2 grid md:grid-cols-2 lg:grid-cols-3 xl:grip-cols-4 gap-6">
            @foreach ($posts as $post )         
            <div>
                <a href="{{ route('posts.show', ['posts' => $post, 'user' => $user->username]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->imagen }}"  alt="ImgPublic {{ $post->titulo }}">
                </a>
            </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links()}}
        </div>
    @else
        <div class="container flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
            </svg>
        </div>
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay post recientes</p>
    @endif
   
</section>

@endsection

