<a {{ $attributes->merge(['class' => 'block px-4 py-3 hover:bg-gray-50 ' . ($active ? 'text-orange-500 font-semibold' : 'text-gray-700')]) }}>
    {{ $slot }}
</a>
