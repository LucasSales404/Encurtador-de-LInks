@extends('partials.app')
@include('components.card-view')
@include('components.loading-screen')
@include('components.alert')

@section('content')
    <section class="lg:p-24 px-6 lg:py py-24 flex flex-col gap-6 lg:h-[calc(100vh-80px)]">
        <div class="title-section">
            <h1 class="font-medium text-2xl">Meus Links</h1>
        </div>

        <div class="links flex flex-col gap-6 w-full">
            @foreach ($links as $link)
                @php
                    $urlEncurtada = route('redirect', ['slug' => $link->slug]);
                @endphp
                <div id="link-{{ $link->id }}" class="link lg:w-[600px] p-6 bg-azulPadrao rounded-[5px] flex flex-col gap-3">
                    <div class="header-card flex justify-between items-center">
                        <div class="title-card">
                            <h2 class="font-signika text-[20px] font-bold">SnapLink</h2>
                        </div>
                        <div data-id="{{ $link->id }}"
                            class="button-delete  flex justify-center items-center cursor-pointer">
                            <img class="max-w-[30px]" src="{{ asset('images/icon-delete.png') }}" alt="">
                        </div>
                    </div>
                    <div class="content font-medium text-[13px]">
                        <div class="flex">
                            <p class="break-all">URL: <span class="text-neutral-500">dsajhdjhdsjhdkjsahdshdhdskahdkjshdlshdjshldkja{{ $link->link->original_url }}</span></p>
                        </div>
                        <div class="flex ">
                            <p>URL encurtada: {{ $urlEncurtada }}</p>
                        </div>
                        <div class="flex">
                            <p>Clicks obtidos: {{ $link->total_clicks }}</p>
                        </div>
                        <div class="flex">
                            <p>Data de criacao: {{ $link->created_at }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div data-count="{{ $links->count() }}"
                class=" without-link w-full h-[calc(100vh-300px)] flex flex-col justify-center items-center">
                <img src="{{ asset('images/icon-robot.png') }}" alt="">
                <h1 class="font-medium text-2xl">Voce ainda nao possui nenhum link</h1>
            </div>
        </div>
    </section>
@endsection

@vite('resources/js/links.js')
@vite('resources/js/alert.js')
@vite('resources/js/showUrl.js')
