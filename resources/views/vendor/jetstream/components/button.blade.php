<button
    {{ $attributes->merge(['type' => 'submit','class' =>'inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary active:bg-primary focus:outline-none focus:border-0 focus:ring focus:ring-primary disabled:opacity-25 transition hover:shadow-accent hover:shadow']) }}>
    {{ $slot }}
</button>
