{{-- NAVBAR --}}
<div class="flex">
    <div class="bg-white md:flex md:justify-between md:px-2 md:py-1 md:items-center w-screen">
        <div class="flex items-center justify-between px-2 py-1 md:px-0 md:py-0 md:w-full">
            <div class="flex items-center justify-center md:justify-start md:ml-2 w-full">
            <a href="{{ route('/') }}"><img class="h-12" src="{{ asset('img/logo/TechNewsLogo.png')}}" alt="Logo TECH NEWS"></a>
            </div>
            <div class="md:hidden">
                <button  type="button" class="block text-black focus:outline-none hover:text-gray-800" onclick="menu()">
                    <svg id="cerrar" style="display: none;" class="h-6 w-6 fill-current bi bi-x-octagon" width="1em" height="1em" 
                    viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.54.146A.5.5 0 014.893 0h6.214a.5.5 0 01.353.146l4.394 4.394a.5.5 0 01.146.353v6.214a.5.5 0 
                    01-.146.353l-4.394 4.394a.5.5 0 01-.353.146H4.893a.5.5 0 01-.353-.146L.146 11.46A.5.5 0 010 11.107V4.893a.5.5 0 
                    01.146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" 
                    clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z"
                    clip-rule="evenodd"/><path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/></svg>

                    <svg id="abrir" class="h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>					
            </div>
        </div>
            <div id="opciones" class="hidden px-1 pb-1 md:flex md:p-0">
                @if (!Auth::guest())
                    @if (auth()->user()->role_id == 2)
                        @if ($menu=='dashboardWriter')
                            <a href="{{ route('writer.news.index') }}" class='block px-2 rounded 
                            rounded bg-red-800 text-white md:mt-0 md:ml-2'>
                        @else
                            <a href="{{ route('writer.news.index') }}" class='block px-2 font-semibold rounded text-black bg-gray-200 
                            rounded hover:bg-red-800 hover:text-white hover:font-normal md:mt-0 md:ml-2'>
                        @endif
                            Dashboard
                        </a>
                        
                    @endif
                @endif
                @if (!Auth::guest())
                    @if (auth()->user()->role_id == 3)
                        @if ($menu=='dashboard')
                            <a href="{{ route('admin.dashboard') }}" class='block px-2 rounded 
                            rounded bg-red-800 text-white md:mt-0 md:ml-2'>
                        @else
                            <a href="{{ route('admin.dashboard') }}" class='block px-2 font-semibold rounded text-black bg-gray-200 
                            rounded hover:bg-red-800 hover:text-white hover:font-normal md:mt-0 md:ml-2'>
                        @endif
                            Dashboard
                        </a>
                        
                    @endif
                @endif
                @if ($menu=='main')
                <a href='{{ route('/') }}' class='block px-2 rounded 
                    rounded bg-red-800 text-white md:mt-0 md:ml-2'>
                @else
                    <a href='{{ route('/') }}' class='block px-2 font-semibold rounded text-black bg-gray-200 
                    rounded hover:bg-red-800 hover:text-white hover:font-normal md:mt-0 md:ml-2'>
                @endif
                    Inicio
                </a>

                @if ($menu=='category')
                    <a href="{{ route('categories.index') }}" class='block mt-1 px-2 rounded 
                    rounded bg-red-800 text-white md:mt-0 md:ml-2'>
                @else
                    <a href="{{ route('categories.index') }}" class='block mt-1 px-2 font-semibold rounded text-black bg-gray-200 
                    rounded hover:bg-red-800 hover:text-white hover:font-normal md:mt-0 md:ml-2'>
                @endif
                    Categorías
                </a>
                
                @if ($menu=='about')
                    <a href='{{ route('about-us') }}' class='block mt-1 px-2 rounded 
                    rounded bg-red-800 text-white md:mt-0 md:ml-2'>
                @else
                    <a href='{{ route('about-us') }}' class='block mt-1 px-2 font-semibold rounded text-black bg-gray-200 
                    rounded hover:bg-red-800 hover:text-white hover:font-normal md:mt-0 md:ml-2'>
                @endif
                    Acerca
                </a>

                @guest
                    <a href='{{ route('login') }}' class='block mt-1 px-2 font-semibold rounded text-black bg-gray-200 
                        rounded hover:bg-red-800 hover:text-white hover:font-normal md:mt-0 md:ml-2'>
                        <div class="flex items-center">
                            <svg class="h-4 w-4 fill-current mr-1" viewBox="-42 0 512 512.002" xmlns="http://www.w3.org/2000/svg">
                                <path d="m210.351562 246.632812c33.882813 0 63.222657-12.152343 87.195313-36.128906 23.972656-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.132812 87.195312 23.976563 23.96875 53.3125 36.125 87.1875 36.125zm0 0"/><path d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.308594-10.339844-7.808594-20.550781-13.371094-30.335938-5.773438-10.15625-12.554688-19-20.164063-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.039063 5.339844-10.972656 0-22.085937-1.796876-33.046874-5.339844-11.210938-3.621094-20.296876-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.75-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.605469 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.058594 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.796875-1.023438 19.964844-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.441406 23.734375 65.066406 23.734375h246.53125c26.625 0 48.511719-7.984375 65.0625-23.734375 16.757813-15.945312 25.253906-37.585937 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm0 0"/>
                            </svg>
                            <span>Ingresar</span>
                        </div>
                    </a>
                @else
                        @if ($menu=='profile')
                        <a href="{{ route('profile.show', Auth::user()->user_name) }}" class='block mt-1 px-2 rounded 
                        rounded bg-red-800 text-white md:mt-0 md:ml-2'>
                    @else
                        <a href="{{ route('profile.show', Auth::user()->user_name) }}" class='block mt-1 px-2 font-semibold rounded text-black bg-gray-200 
                        rounded hover:bg-red-800 hover:text-white hover:font-normal md:mt-0 md:ml-2'>
                    @endif
                        <div class="flex items-center">
                            <svg class="h-4 w-4 fill-current mr-1" viewBox="-42 0 512 512.002" xmlns="http://www.w3.org/2000/svg">
                                <path d="m210.351562 246.632812c33.882813 0 63.222657-12.152343 87.195313-36.128906 23.972656-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.132812 87.195312 23.976563 23.96875 53.3125 36.125 87.1875 36.125zm0 0"/><path d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.308594-10.339844-7.808594-20.550781-13.371094-30.335938-5.773438-10.15625-12.554688-19-20.164063-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.039063 5.339844-10.972656 0-22.085937-1.796876-33.046874-5.339844-11.210938-3.621094-20.296876-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.75-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.605469 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.058594 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.796875-1.023438 19.964844-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.441406 23.734375 65.066406 23.734375h246.53125c26.625 0 48.511719-7.984375 65.0625-23.734375 16.757813-15.945312 25.253906-37.585937 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm0 0"/>
                            </svg>
                            <span>{{ Auth::user()->user_name }}</span>
                        </div>
                    </a>
                    
                @endguest
                
            </div>
        </div>
    </div>
{{-- navbar script --}}
<script src="{{ asset('js/navbar.js') }}"></script>