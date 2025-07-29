@include('partials.app')
@include('components.card-view')
@include('components.loading-screen')
@include('components.alert')
<main class="">
    <section
        class="px-24 flex-col flex items-center justify-between gap-32 pt-28 pb-14 h-full w-full bg-neutral-900 text-white py-[20px]">
        <div class="encurtar-content">
            <div class="title-section flex justify-center h-[60px]">
                <h2 class="font-medium text-2xl">Encurte seu link aqui</h2>
            </div>
            <form action="" id="formEncurtar" class="flex flex-col gap-[10px] w-[400px]">
                <div class="input-content w-[400px] flex flex-col gap-[2px] relative">
                    <label for="url">URL</label>
                    <input id="inputUrl" class="bg-neutral-800 rounded-[3px] border-0 w-full h-[45px]" required
                        placeholder="Insira seu link aqui" type="text" name="url" id="url">
                    <div id="buttonPaste"
                        class="paste w-[45px] h-[45px] cursor-pointer absolute top-[25px] right-0 flex items-center justify-center">
                        <img class="max-w-[20px]" src="{{ asset('images/icon-paste.png') }}" alt="">
                    </div>
                </div>
                <div class="input-content w-[400px] flex flex-col gap-[2px]">
                    <label for="url">Personalizar Link</label>
                    <input id="personalizarLink" class="bg-neutral-800 rounded-[3px] border-0 w-full h-[45px]"
                        placeholder="Defina o caminho personalizado" type="text" name="url" id="url">
                </div>
                <p class="text-[13px] text-neutral-300">Seu link ficará assim: <span
                        id="caminho">https://encurtar.link/</span></p>
                <button data-urlEncurta="https://encurtar.link/" id="buttonEncurtar" type="submit"
                    style="background-color: rgb(0, 0, 195)"
                    class="rounded-[3px] border-0 w-full h-[45px] font-medium">Encurtar</button>
            </form>
        </div>
        <div class="cards-features w-[750px] h-[300px] flex gap-[15px]">
            <div
                class="card w-[250px] h-[250px] p-6 flex justify-center items-center flex-col border-[3px] rounded-[5px] gap-[12px]">
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
                class="card w-[250px] h-[250px] p-6 flex justify-center items-center flex-col border-[3px] rounded-[5px] gap-[12px]">
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
                class="card w-[250px] h-[250px] p-6 flex justify-center items-center flex-col border-[3px] rounded-[5px] gap-[12px]">
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
</main>
@vite('resources/js/alert.js')
@vite('resources/js/showUrl.js')
@vite('resources/js/index.js')
@vite('resources/js/pasteLink.js')
