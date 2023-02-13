<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
        <title>JGram - @yield('titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles
    </head>
    <body class="bg-gray-100">
       <header class="p-5 border-b bg-white shadow-lg md:flex sm:flex lg:flex">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                  <a href="{{route('home')}}">
                    JGram
                  </a>
                </h1>
                @auth
                <nav class="flex justify-start gap-2">
                    <a href="{{ route('posts.create') }}" class="flex items-center bg-white border p-2 gap-2 text-gray-600 rounded text-sm
                    uppercase font-bold cursor-pointer
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>                    
                    crear                    
                    </a>
                    <a class="font-bold text-gray-600 text-sm" href="#">
                        
                        <div x-data="{ open: false }"0">
                            <div @click="open = !open" class="relative border-b-4 border-transparent py-3" :class="{'border-indigo-700 transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                              <div class="flex justify-between items-center space-x-3 cursor-pointer">
                                <div class="container items-center">
                                  <div class="mx-4 w-12 h-12 rounded-full overflow-hidden border-2 dark:border-white border-gray-900">
                                    <img src="{{ auth()->user()->imagenPerfil ? asset('uploads/profile') . '/' . auth()->user()->imagenPerfil : asset('img/userProfileDefault.png' )}}" alt="" class="w-full h-full object-cover">
                                  </div>
                                  <p class="flex text-center">{{auth()->user()->name}}</p>
                                </div>
                              </div>
                              <div 
                              
                              x-show="open" 
                              x-transition:enter="transition ease-out duration-100" 
                              x-transition:enter-start="transform opacity-0 scale-95" 
                              x-transition:enter-end="transform opacity-100 scale-100" -
                              x-transition:leave="transition ease-in duration-75" 
                              x-transition:leave-start="transform opacity-100 scale-100" 
                              x-transition:leave-end="transform opacity-0 scale-95" 
                              class="absolute w-20 px-5 py-3 dark:bg-white-800 bg-white rounded-lg border dark:border-transparent mt-5 text-black shadow-xl"
                              >
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <ul class="space-y-3 dark:text-dark">
                                  <li class="font-medium">
                                    <a href="{{ route('posts.index', auth()->user()->username) }}" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                                      <div class="mr-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                      </div>
                                    </a>
                                  </li>
                                  <hr class="dark:border-gray-700">
                                  @if (auth()->user()->id)  
                                  <li class="font-medium">
                                    <a href="{{ route('perfil.index') }}" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                                      <div class="mr-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                      </div>
                                    </a>
                                  </li>
                                  @endif
                                  <hr class="dark:border-gray-700">
                                  <li class="font-medium">
                                    <a class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                                      <div class="mr-3 text-red-600 cursor-pointer">
                                        <button type="submit"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg></button>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                               </form>
                              </div>
                            </div>
                        </div>
                    </a>
                </nav>
                @endauth


                @guest

                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">registro</a>
                </nav>

                @endguest
            </div>
       </header>

        <main class="container mx-auto mt-10">
            {{-- contenido de las vistas --}}
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>

            @yield('contenido')
        </main>
        
        <footer class="text-center p-5 mt-10 text-black bg-white shadow-md">
          JGram - Todos los derechos reservados {{ now()->year }}
        </footer>
        @livewireScripts
    </body>
</html>
