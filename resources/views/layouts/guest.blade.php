@extends('partials.app')
@section('content')
<div class="flex sm:justify-center items-center sm:p-28 bg-neutral- h-[calc(100vh-80px)]">
    <div class="w-full sm:max-w-[500px] mt-6 px-6 py-4 bg-neutral-800 shadow-md overflow-hidden sm:rounded-[8px]">
        {{ $slot }}
    </div>
</div>
@endsection