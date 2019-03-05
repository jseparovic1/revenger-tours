<button
    class="w-full bg-brand hover:bg-brand-dark text-white uppercase text-lg mx-auto p-4 rounded font-bold tracking-tight {{ $class ?? null }}"
    type="submit">
    {{ $slot ?? 'SEND' }}
</button>
