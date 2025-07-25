@include('partials.app')
@include('components.card-view')
@include('components.loading-screen')
<main>
    <section
        class=" flex flex-col items-center justify-center gap-[10px] h-[calc(100vh-80px)] w-full bg-neutral-900 text-white py-[20px]">
        <div class="title-section">
            <h2 class="font-medium text-2xl">Encurte seu link aqui</h2>
        </div>
        <form action="" id="formEncurtar" class="flex flex-col gap-[10px] w-[400px]">
            <div class="input-content w-[400px] flex flex-col gap-[2px] relative">
                <label for="url">URL</label>
                <input id="inputUrl" class="bg-neutral-800 rounded-[3px] border-0 w-full h-[45px]"
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
            <p class="text-[13px] text-neutral-300">Seu link ficará assim: <span id="caminho">https://encurtar.link/</span></p>
            <button data-urlEncurta="https://encurtar.link/" id="buttonEncurtar" type="submit" style="background-color: rgb(0, 0, 195)"
                class="rounded-[3px] border-0 w-full h-[45px] font-medium">Encurtar</button>
        </form>
    </section>
</main>
