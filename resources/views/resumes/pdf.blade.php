<x-app title="{{$resume->FIO}}">
    <x-slot name="head">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    </x-slot>
    {!! $resume->skills !!}
    {!! $resume->resume !!}
    {!! $resume->experience !!}
</x-app>

