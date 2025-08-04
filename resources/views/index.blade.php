@extends('partials.app')
@include('components.card-view')
@include('components.loading-screen')
@include('components.alert')
@include('components.contact')
@section('content')
    <section
        class="lg:px-24 px-8 lg:flex flex-col flex items-center justify-between gap-32 pt-28 pb-14  w-full bg-neutral-900 text-white py-[20px]">
        <div class="encurtar-content flex lg:items-center flex-col  w-full">
            <div class="title-section flex justify-center h-[60px]">
                <h2 class="font-medium lg:text-2xl text-xl">Encurte seu link aqui</h2>
            </div>
            <form action="" id="formEncurtar" class="flex flex-col gap-[10px] lg:w-[500px] w-full">
                <div class="input-content lg:w-[500px] w-full flex flex-col gap-[2px] relative">
                    <label class="font-medium" for="url">URL</label>
                    <input id="inputUrl" class="bg-neutral-800 rounded-[3px] border-0 w-full h-[45px] bg-no-repeat bg-[15px_center] px-[45px]" required
                        placeholder="Insira seu link aqui" type="text" name="original_url" id="url" style="background-image: url('images/icon-link.png'); background-size:20px;">
                    <div id="buttonPaste"
                        class="paste w-[45px] h-[45px] cursor-pointer absolute top-[25px] right-0 flex items-center justify-center">
                        <img class="max-w-[20px]" src="{{ asset('images/icon-paste.png') }}" alt="">
                    </div>
                </div>
                <div class="input-content lg:w-[500px] w-full flex flex-col gap-[2px]">
                    <label class="font-medium" for="url">Personalizar Link</label>
                    <input id="personalizarLink" class="bg-neutral-800 rounded-[3px] border-0 w-full h-[45px] bg-no-repeat bg-[15px_center] px-[45px]"
                        placeholder="Defina o caminho personalizado" type="text" name="slug" id="url" style="background-image: url('images/icon-edit.png'); background-size:20px;">
                </div>
                <p class="text-[13px] text-neutral-300">Seu link ficará assim: <span
                        id="caminho">https://SnapLink/</span></p>
                <button data-urlEncurta="https://encurtar.link/" id="buttonEncurtar" type="submit"
                    class="rounded-[3px] border-0 w-full h-[45px] font-medium bg-azulPadrao hover:bg-blue-700">Encurtar</button>
            </form>
        </div>

        <div class="cards-features lg:w-[750px] lg:h-[300px] w-full flex gap-[15px] lg:flex-row flex-col justify-center items-center">
            <div
                class="card hover:bg-neutral-700 hover:scale-[1.05] w-[250px] h-[250px] p-6 flex justify-center items-center flex-col bg-neutral-800 rounded-[5px] gap-[12px]">
                <div class="header-card flex justify-center items-center h-[30px]">
                    <h1 class="font-medium text-[18px] ">Estatisticas</h1>
                </div>
                <div class="image flex justify-center  items-center h-[100px]">
                    <img class="max-w-[80px]" src="{{ asset('images/icon-estatistica.png') }}" alt="">
                </div>
                <div class="description flex justify-center items-center ">
                    <p class="text-[14px] text-center">Acompanhe quantos cliques seus links receberam em tempo real!</p>
                </div>
            </div>

            <div
                class="card hover:bg-neutral-700 hover:scale-[1.05] w-[250px] h-[250px] p-6 flex justify-center items-center flex-col bg-neutral-800 rounded-[5px] gap-[12px]">
                <div class="header-card flex justify-center items-center h-[30px]">
                    <h1 class="font-medium text-[18px] ">Site Grátis</h1>
                </div>
                <div class="image flex justify-center  items-center h-[100px]">
                    <img class="max-w-[80px]" src="{{ asset('images/icon-free.png') }}" alt="">
                </div>
                <div class="description flex justify-center items-center ">
                    <p class="text-[14px] text-center">Use nosso site sem custos, com todas as funcionalidades
                        disponíveis.</p>
                </div>
            </div>

            <div
                class="card hover:bg-neutral-700 hover:scale-[1.05] w-[250px] h-[250px] bg-neutral-800 p-6 flex justify-center items-center flex-col rounded-[5px] gap-[12px]">
                <div class="header-card flex justify-center items-center h-[30px]">
                    <h1 class="font-medium text-[18px] ">URL Curtas</h1>
                </div>
                <div class="image flex justify-center  items-center h-[100px]">
                    <img class="max-w-[80px]" src="{{ asset('images/icon-url.png') }}" alt="">
                </div>
                <div class="description flex justify-center items-center ">
                    <p class="text-[14px] text-center">Transforme links longos em URLs curtas e fáceis de compartilhar.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
@vite('resources/js/alert.js')
@vite('resources/js/showUrl.js')
@vite('resources/js/index.js')
@vite('resources/js/pasteLink.js')
@vite('resources/js/contact.js')
