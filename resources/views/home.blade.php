@extends('layouts.app')

@section('titulo')
   Pagina Principal
@endsection


@section('contenido')
     @if ($posts->count())
        @foreach ($posts as $post)
         <div class="w-full h-full grid grid-cols-3">
            <div class="col-span-1 flex justify-start ml-2"></div>
            <div class="col-span-3 h-full">
               <div class="mt-6 w-full h-full pb-5">
                  <div class="mt-4 w-full h-full">
                     <div class="grid grid-cols-1 gap-2">
                        <div class="w-full shadow h-auto bg-white rounded-md">
                           <div class="flex items-center space-x-2 p-2.5 px-4">
                              <div class="w-10 h-10">
                                 <img src="{{ asset('uploads/profile') . '/' . $post->user->imagenPerfil }}" class="w-full h-full rounded-full" alt="">
                              </div>
                              <div class="flex-grow flex flex-col">
                                 <p class="font-semibold text-md text-gray-700"><a href="{{ route('posts.index', $post->user) }}">{{$post->user->username}}</a></p>
                                 <span class="text-xs font-thin text-gray-400">{{$post->created_at->diffForHumans()}}</span>
                              </div>
                           </div>
                           <div class="mb-1 mx-2">
                              <p class="text-gray-700 max-h-10 truncate px-3 text-sm">
                                 {{$post->titulo}}
                              </p>
                           </div>
                           <div class="w-full h-76 max-h-100">
                              <img src="{{ asset('uploads' . '/' . $post->imagen )}}" alt="imagenPublicacion {{$post->titulo}}" class="w-full h-76 max-h-100 object-cover">
                           </div>
                           <div class="w-full flex flex-col space-y-2 p-2 px-4">
                              <div class="flex items-center justify-between pb-2 border-b border-gray-300 text-gray-500 text-sm">
                                 <div class="flex items-center">
                                    <div class="flex items-center">
                                       <p class="font-bold text-sm text-black">{{ $post->like->count() }} Me gusta</p>
                                    </div>
                                 </div>
                                 <div class="flex items-center space-x-2">
                                    <p class="font-bold text-sm text-black">{{ $post->comentarios->count() }} comentarios</p>
                                 </div>
                              </div>
                           </div>
                           <div class="flex space-x-3 text-gray-500 text-sm font-thin">
                              <div class="p-2 mx-2">
                                 <livewire:like-post :posts="$post"/>
                              </div>
                              <div class="mx-2">
                                 <a href="{{ route('posts.show', ['posts' => $post, 'user' => $post->user->username]) }}">
                                  <button class="p-2 mx-1">
                                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-3">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                       </svg> 
                                       Comments
                                  </button>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        @endforeach
         @else
         <p class="flex justify-center font-bold text-gray-500">
            No hay publicaciones recientes  
         </p>
     @endif
@endsection