<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="py-12 px-6">
        @csrf
        <div class="title w-full flex justify-center h-[50px]">
            <h1 class="font-medium text-2xl">Cadastro</h1>
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" placeholder="Insira o seu Nome" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" placeholder="Insira o seu Email" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full" placeholder="Insira a sua Senha" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" placeholder="Confirme a sua Senha" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col items-center justify-center gap-[10px] pt-10">
            <x-primary-button class="ms-3 w-[200px] h-[40px]">
                {{ __('Cadastrar') }}
            </x-primary-button>
             <div class="flex items-center gap-[10px] pl-2">
               <x-input-label for="register" :value="__('Já possui uma conta?')" />
                <a class="underline text-sm text-gray-600 dark:text-gray-400  hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Entrar') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
