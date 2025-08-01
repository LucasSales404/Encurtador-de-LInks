<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>SnapLink</title>
</head>

<body class="bg-neutral-900 text-white relative">
    <header class="flex items-center bg-azulPadrao relative w-full h-[90px] px-24 justify-between">
        <div class="name-site cursor-pointer  flex justify-center items-center">
            <a href="/index">
                <img class="w-[170px]" src="{{ asset('images/logo.png') }}" alt="">
            </a>
        </div>
        <nav class=" flex gap-7 justify-center items-center font-medium  bg-azulPadrao ">
            @auth
                <div class="profile-content relative  flex flex-col justify-center items-center gap-[3px]">
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
            <ul class="flex gap-4 justify-center items-center">
                @auth
                    <li class="hover:text-neutral-300 hover:scale-[1.05]"><a href="/links">Meus Links</a></li>
                @endauth
                @guest
                    <div class="group">
                        <a href="./login">
                            <button
                                class="btnLogin bg-white text-black hover:bg-neutral-900 hover:text-white w-[100px] h-[35px] transition-[4s] rounded-[2px]">Entrar</button>
                        </a>
                        <a href="./register">
                            <button
                                class="btnRegister w-[100px] h-[35px] hover:bg-white hover:text-black rounded-[2px] transition-[4s]">Cadastro</button>
                        </a>
                    </div>
                @endguest
                <li class="hover:text-neutral-300 hover:scale-[1.05]"><a href="/index">Início</a></li>
                <li class="hover:text-neutral-300 hover:scale-[1.05]"><a href="/about">Sobre</a></li>
                <li class="hover:text-neutral-300 hover:scale-[1.05] buttonContact cursor-pointer">Contato</li>
                <li class="hover:text-neutral-300 hover:scale-[1.05]"><a href="/ajuda">Ajuda</a></li>
                </li>
            </ul>
        </nav>
    </header>
    <main class="">
        @yield('content')
    </main>

    <footer class="w-full h-[180px] bg-neutral-800 px-24 flex justify-between items-center ">
        <div class="logo  w-[350px] flex justify-center items-center ">
            <a href="/index">
                <img class="w-[300px]" src="{{ asset('images/logo.png') }}" alt="">
            </a>
        </div>
        <div class="copyRight ">
            <p class="text-neutral-500">SnapLink © 2025 - Todos os direitos reservados</p>
        </div>
        <div class="footer-content ">
            <ul class="grid grid-cols-2 gap-4 z- text-neutral-500 w-[350px]">
                <li class="hover:text-neutral-300 "><a href="/about">Sobre</a></li>
                <li class="hover:text-neutral-300 hover:scale-[1.05] cursor-pointer buttonContact">Contato</li>
                <li class="hover:text-neutral-300 "><a href="/ajuda">Ajuda</a></li>
                <li class="hover:text-neutral-300 "><a href="/termos">Termos de uso</a></li>
                <li class="hover:text-neutral-300 "><a href="/politica">Politica de privacidade</a>
                </li>
            </ul>
        </div>
    </footer>
    @auth
        @vite('resources/js/menuBar.js')
    @endauth
    @vite('resources/js/logout.js')
    @vite('resources/js/contact.js')
     @vite('resources/js/btnLogin.js')



</body>

</html>
