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
    <title>SnapLink</title>
</head>

<body class="bg-neutral-900 text-white relative">
    <header class="flex items-center flex-col-reverse bg-azulPadrao relative w-full h-[190px]  justify-end">
        <div class="name-site cursor-pointer w-full h-[120px] bg-neutral-800 flex justify-center items-center">
            <a href="/index">
                <img class="w-[220px]" src="{{ asset('images/logo.png') }}" alt="">
            </a>
        </div>
        <nav class=" flex gap-7 justify-center items-center font-medium w-full bg-azulPadrao  h-[70px]">
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
            <ul class="flex gap-4">
                @auth
                    <li class="hover:text-neutral-300"><a href="/index">Início</a></li>
                    <li class="hover:text-neutral-300"><a href="/links">Meus Links</a></li>
                @endauth
                <li class="hover:text-neutral-300"><a href="/sobre">Sobre</a></li>
                <li class="hover:text-neutral-300"><a href="/contato">Contato</a></li>
                <li class="hover:text-neutral-300"><a href="/ajuda">Ajuda</a></li>
                <li class="hover:text-neutral-300"><a href="/termos">Termos de uso</a></li>
                <li class="hover:text-neutral-300"><a href="/politica">Politica de privacidade</a></li>
            </ul>
        </nav>
    </header>
    @vite('resources/js/menuBar.js')
    @vite('resources/js/logout.js')

</body>

</html>
