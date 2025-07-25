<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>Encurta Link</title>
</head>

<body class="bg-neutral-900 text-white relative">
    <header class="flex items-center justify-between w-full h-[80px] px-24 bg-neutral-950">
        <div class="name-site">
            <h1>Encurta Link</h1>
        </div>
        <nav class="border-4 flex gap-4 justify-center items-center">
            <div class="profile flex justify-center items-center gap-[3px]">
                <div class="icon-profile">
                    <div class="circle flex items-center justify-center w-[50px] h-[50px] rounded-full bg-neutral-700">
                        <p>U</p>
                    </div>
                </div>
                <div class="name-profile flex justify-center items-center gap-[2px] cursor-pointer">
                    <p>Username</p>
                    <span class="inline-block rotate-90 relative top-[2px]">></span>
                </div>
            </div>
            <ul class="flex gap-4">
                <li><a href="/">Início</a></li>
                <li><a href="/links">Meus Links</a></li>
            </ul>
        </nav>
    </header>
    @vite('resources/js/pasteLink.js')
    @vite('resources/js/index.js')
</body>

</html>
