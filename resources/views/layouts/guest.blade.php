@include('partials.app')
<div class="flex sm:justify-center items-center sm:p-28 bg-neutral-950">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-neutral-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
