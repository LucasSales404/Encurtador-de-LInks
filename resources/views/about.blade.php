@extends('partials.app')

@section('content')
    <section class="p-24 h-[800px]  flex flex-col gap-[40px]">
        <div class="title-section">
            <h1 class="font-medium text-3xl">Sobre nós</h1>
        </div>
        <div class="quests flex flex-col gap-[15px]">
            <div class="about-me flex flex-col gap-[5px]">
               <div class="flex gap-[7px] items-center">
                    <img class=" w-[25px]"  src="{{ asset( 'images/icon-help.png') }}" alt="">
                    <h1 class="font-medium text-2xl">O que é o SnapLink?</h1>
                </div>
                <p class="text-neutral-200">O SnapLink é uma plataforma simples e eficiente para encurtar URLs, tornando seus
                    links mais curtos, fáceis de compartilhar e acompanhar.</p>
            </div>
            <div class="about-me flex flex-col gap-[5px]">
               <div class="flex gap-[7px] items-center">
                    <img class=" w-[25px]"  src="{{ asset('images/icon-feature.png') }}" alt="">
                    <h1 class="font-medium text-2xl">Funcionalidades</h1>
                </div>
                <p class="text-neutral-200">Nós oferecemos diversos recursos para você encurtar e Gerenciar seus Links. Como:
                </p>
                <ul class="list-disc list-inside marker:text-azulPadrao">
                    <li class="text-neutral-200">Encurtar URLs</li>
                    <li class="text-neutral-200">Gerenciamento de Links</li>
                    <li class="text-neutral-200">Estatísticas de desempenho dos seus links</li>
                </ul>

            </div>
            <div class="about-me flex flex-col gap-[5px]">
                  <div class="flex gap-[7px] items-center">
                    <img class=" w-[25px]"  src="{{ asset('images/icon-objetivo.png') }}" alt="">
                    <h1 class="font-medium text-2xl">Objetivos</h1>
                </div>
                <p class="text-neutral-200">O nosso objetivo principal e aprimorar a experiencia de encurtamento de URLs,
                    fornecendo uma interface intuitiva e fácil de usar.</p>
            </div>
            <div class="about-me flex flex-col  gap-[5px]">
                <div class="flex gap-[7px] items-center">
                    <img class="w-[25px] h-[25px]" src="{{ asset('images/icon-security.png') }}" alt="">
                    <h1 class="font-medium text-2xl">Segurança</h1>
                </div>
                <p class="text-neutral-200">Nossa plataforma segue as melhores práticas de segurança para garantir a
                    privacidade e segurança dos seus dados.</p>
            </div>
        </div>
        <div class="buttonHome">
            <a href="/index">
                <div class="bg-azulPadrao w-[200px] h-[40px] flex justify-center items-center gap-[3px] rounded-[4px] font-medium">
                    <img class="w-[20px]" src="{{ asset('images/icon-return.png') }}" alt="">
                    <p class="flex justify-center text-[15px] items-center h-full">Voltar para Home</p>
                </div>
            </a>
        </div>
    </section>
@endsection
