<button {{ $attributes->merge(['type' => 'submit', 'class' => ' text-center py-2 bg-azulPadrao border border-transparent rounded-[3px] font-semibold text-[13px] text-white uppercase tracking-widest hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
