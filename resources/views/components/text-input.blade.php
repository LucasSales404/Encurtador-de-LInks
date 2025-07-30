@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-0 bg-neutral-700 text-gray-300 focus:border-indigo-600 focus:ring-indigo-600 rounded-[3px] shadow-sm']) }}>
