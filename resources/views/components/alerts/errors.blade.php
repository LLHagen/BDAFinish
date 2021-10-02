@if ($errors->all())
    <x-alerts.alert class="alert alert-danger">
        @foreach ($errors->all() as $message)
            {{ $message }}<br>
        @endforeach
    </x-alerts.alert>
@endif
