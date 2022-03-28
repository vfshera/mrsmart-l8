<x-layout>
    <div class="not-found-page">
        <h1>Ooops!</h1>
        <p>Page Not Found</p>
        <span>/{{ request()->path() }}</span>
        <a href="{{ route('welcome') }}">Lets Get Home</a>
    </div>
</x-layout>
