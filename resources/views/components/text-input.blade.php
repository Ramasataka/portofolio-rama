@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-primary-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm']) }}>
