<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-primary text-gray-200 rounded hover:bg-gray-600 hover:text-white px-3 py-1 focus:outline-none mx-1']) }}>
    {{ $slot }}
</button>
