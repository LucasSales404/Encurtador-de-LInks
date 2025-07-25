<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Encurta Link</title>
</head>

<body class="bg-neutral-900 text-white relative">
    <header class="flex items-center justify-between w-full h-[80px] px-24 bg-neutral-950">
        <div class="name-site">
            <h1 class="font-signika text-xl font-bold">SnapLink</h1>
        </div>
        <nav class=" flex gap-2 justify-center items-center">
            <div class="profile-content relative  flex flex-col justify-center items-center gap-[3px]">
                <div class="profile w-[150px] flex items-center gap-[4px]">
                    <div class="icon-profile">
                        <div
                            class="circle flex items-center justify-center w-[40px] h-[40px] rounded-full bg-neutral-700">
                            <p>{{substr($user->name, 0, 1)}}</p>
                        </div>
                    </div>
                    <div class="name-profile flex justify-center items-center gap-[2px] cursor-pointer">
                        <p>{{$user->name}}</p>
                        <span class="drop-menu inline-block rotate-90 relative top-[2px]">></span>
                    </div>
                </div>
                <div id="profileBar"
                    class="hidden border-[1px] rounded-[3px] absolute w-[150px] h-[60px] bg-neutral-800 flex flex-col justify-center top-[80px] left-[0px]">

                    <div
                        class="triangle absolute top-[-10px] left-1/4 -translate-x-1/2 w-0 h-0 border-l-[7.5px] border-r-[7.5px] border-b-[10px] border-l-transparent border-r-transparent border-b-neutral-500">
                    </div>

                    <ul>
                        <li class="border-b-[1px] hover:bg-neutral-700 cursor-pointer px-4"><a href="/profile">Editar
                                Perfil</a></li>
                        <li class="hover:bg-neutral-700 cursor-pointer px-4"><a href="/logout">Sair</a></li>
                    </ul>
                </div>
            </div>
            <ul class="flex gap-4">
                <li><a href="/index">Início</a></li>
                <li><a href="/links">Meus Links</a></li>
            </ul>
        </nav>
    </header>
    @vite('resources/js/pasteLink.js')
    @vite('resources/js/index.js')
    @vite('resources/js/menuBar.js')
</body>

</html>
