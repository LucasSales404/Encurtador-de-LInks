@extends('partials.app')
@section('content')
<div class="flex sm:justify-center items-center bg-neutral- h-[calc(100vh-80px)]">
    <div class="w-full sm:max-w-[500px] mt-6 lg:px-6 lg:py-2  p-6 lg:bg-neutral-800 shadow-md overflow-hidden sm:rounded-[8px]">
        {{ $slot }}
    </div>
</div>
@endsection