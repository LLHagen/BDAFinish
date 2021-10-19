<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </x-slot>

    <x-navbar></x-navbar>


    <div class="container">
        @yield("content")
    </div>
</x-app>
