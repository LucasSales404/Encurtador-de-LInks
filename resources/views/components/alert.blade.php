<div 
    class="absolute hidden content-alert z-40 w-full h-[calc(100vh-80px)] flex justify-center items-center backdrop-blur-sm bg-black/30">
    <div class="card-view bg-neutral-800 w-[500px] h-[180px] flex flex-col gap-4 px-10 justify-center rounded-md">
        <div class="header-card w-full h-[30px] flex items-center justify-between">
            <div class="flex justify-center items-center gap-[4px]">
                <img class="max-w-[30px]" src="{{ asset('images/icon-alert.png') }}" alt="">
                <h2 class="font-medium">Alerta</h2>
            </div>
            <p id="buttonClose" class="cursor-pointer text-[18px] font-medium">X</p>
        </div>
        <div class="content-card w-full flex px-6 flex-col items-center justify-center gap-[15px]">
            <p class="text-card"></p>
            <button class="button-ok bg-blue-600 rounded-[2px] font-medium w-[80px] h-[35px]">Ok</button>
        </div>
    </div>
</div>