@include('components.contact')
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>SnapLink</title>
</head>

<body class="bg-neutral-900 text-white relative">
    <header class="flex items-center bg-azulPadrao relative w-full sm:full h-[90px] px-8 lg:px-24 justify-between">
        <div class="name-site cursor-pointer  flex justify-center items-center">
            <a href="/index">
                <img class="lg:w-[170px] w-[140px]" src="{{ asset('images/logo.png') }}" alt="">
            </a>
        </div>

        <nav class="relative gap-7 lg:flex lg:justify-end lg:w-full items-center font-medium hidden bg-azulPadrao ">
            @auth
                <div class="profile-content relative flex flex-col justify-center items-center gap-[3px]">
                    <div class="profile flex items-center gap-[4px]">
                        <div class="icon-profile">
                            <div class="circle flex items-center justify-center w-[40px] h-[40px] rounded-full bg-blue-500">
                                <p>{{ substr($user->name, 0, 1) }}</p>
                            </div>
                        </div>
                        <div class="name-profile flex justify-center items-center gap-[2px] cursor-pointer ">
                            <p class="hover:text-neutral-300">{{ $fullName }}</p>
                            <span class="drop-menu inline-block rotate-90 relative top-[2px]">></span>
                        </div>
                    </div>
                    <div id="profileBar"
                        class="hidden bg-azulPadrao rounded-[3px] absolute w-[150px] h-[80px] flex flex-col justify-center top-[55px] left-[0px]">
                        <div class="flex flex-col justify-center">
                            <button
                                class="profile-edit border-b-[1px] border-blue-600 text-start px-4 py-2 hover:bg-blue-800 cursor-pointer">
                                Editar Perfil
                            </button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                @csrf
                            </form>
                            <button class="buttonLogout text-start py-2 px-4 hover:bg-blue-800 cursor-pointer">
                                Sair
                            </button>
                        </div>

                    </div>
                </div>
            @endauth
            <ul class="flex gap-4 justify-center items-center ">
                @guest
                <div class="group flex">
                    <a href="./login">
                        <button
                        class="btnLogin bg-white text-black hover:bg-neutral-900 hover:text-white w-[100px] h-[35px] transition-[4s] rounded-[2px]">Entrar</button>
                    </a>
                    <a href="./register" class="hidden lg:block">
                        <button
                        class="btnRegister w-[100px] h-[35px] hover:bg-white hover:text-black rounded-[2px] transition-[4s]">Cadastro</button>
                    </a>
                </div>
                @endguest
                <li class="hover:text-neutral-300 hover:scale-[1.05] lg:block hidden"><a href="/index">Início</a></li>
                @auth
                    <li class="hover:text-neutral-300 hover:scale-[1.05]"><a href="/links">Meus Links</a></li>
                @endauth
                <li class="hover:text-neutral-300 hover:scale-[1.05] lg:block hidden"><a href="/about">Sobre</a></li>
                <li class="hover:text-neutral-300 hover:scale-[1.05] lg:block hidden buttonContact cursor-pointer">
                    Contato</li>
                <li class="hover:text-neutral-300 hover:scale-[1.05] lg:block hidden"><a href="/ajuda">Ajuda</a></li>
            </ul>
        </nav>
        <div class="flex items-center justify-between lg:hidden gap-4">
            @guest
                
            <a href="./login">
                <button
                class="btnLogin bg-white text-black active:bg-neutral-900 active:text-white w-[100px] h-[35px] transition-[4s] rounded-[2px] font-medium">Entrar</button>
            </a>
            @endguest
            <div class="btn-menu-mob lg:hidden block" data-dropped="{{ asset('images/icon-droppedMenu.png') }}"
                data-undropped="{{ asset('images/icon-menu.png') }}">
                <img class="w-[40px]" src="{{ asset('images/icon-menu.png') }}" alt="">
            </div>
        </div>
    </header>
    <div class="menu-mob-content w-full py-2 lg:hidden hidden bg-neutral-950">
        <ul class="font-medium">
            <li
                class=" active:bg-azulPadrao h-[60px] text-[18px] flex items-center border-b-[1px] border-neutral-500 px-10 buttonContact cursor-pointer">
                Cadastrar</li>
            <li
                class=" active:bg-azulPadrao h-[60px] text-[18px] flex items-center border-b-[1px] border-neutral-500 px-10">
                <a href="/index">Início</a>
            </li>
            @auth
                <li class=" active:bg-azulPadrao h-[60px] text-[18px] flex items-center border-b-[1px] border-neutral-500 px-10">Meus Links</li>
            @endauth
            <li
                class=" active:bg-azulPadrao h-[60px] text-[18px] flex items-center border-b-[1px] border-neutral-500 px-10">
                Sobre</li>
            <li
                class=" active:bg-azulPadrao h-[60px] text-[18px] flex items-center border-b-[1px] border-neutral-500 px-10 buttonContact cursor-pointer">
                Contato</li>
            <li class=" active:bg-azulPadrao h-[60px] text-[18px] flex items-center border-neutral-500 px-10">Ajuda</li>
        </ul>
    </div>
    <main class="">
        @yield('content')
    </main>

    <footer class="w-full bg-neutral-800 lg:h-[180px] lg:px-24 px-12 flex lg:py-0 py-8 gap-4 flex-col lg:flex-row justify-between items-center ">
        <div class="logo  w-[350px] flex justify-center items-center ">
            <a href="/index">
                <img class="lg:w-[300px] w-[180px]" src="{{ asset('images/logo.png') }}" alt="">
            </a>
        </div>
        <div class="copyRight lg:text-[16px]  text-[13px] ">
            <p class="text-neutral-500">SnapLink © 2025 - Todos os direitos reservados</p>
        </div>
        <div class="footer-content flex1 justify-center items-center px-4 lg:px-0">
            <ul class="grid grid-cols-2 lg:gap-4 gap-2 text-neutral-500 ">
                <li class="hover:text-neutral-300 "><a href="/about">Sobre</a></li>
                <li class="hover:text-neutral-300 hover:scale-[1.05] cursor-pointer buttonContact">Contato</li>
                <li class="hover:text-neutral-300 "><a href="/ajuda">Ajuda</a></li>
                <li class="hover:text-neutral-300 "><a href="/termos">Termos de uso</a></li>
                <li class="hover:text-neutral-300 "><a href="/politica">Politica de privacidade</a>
                </li>
            </ul>
        </div>
    </footer>
    @vite('resources/js/menuBar.js')
    @vite('resources/js/logout.js')
    @vite('resources/js/contact.js')
    @vite('resources/js/btnLogin.js')

</body>

</html>
