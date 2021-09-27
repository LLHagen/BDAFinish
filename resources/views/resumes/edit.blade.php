<x-app>
    <p>Resumes {{ $resume->id }}</p>

    <form action="/resumes/{{ $resume->id }}"  id="updateResume" method="post">
        @csrf
        @method('patch')
        <input type="text" name="resume" id="resume" value="{{ $resume->FIO }}">
        <input type="submit" name="updateResume"value="Изменить Resume">
    </form>

    <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>
    @if ($errors->all())
        <x-alerts.alert class="alert alert-danger">
            @foreach ($errors->all() as $message)
                {{ $message }}<br>
            @endforeach
        </x-alerts.alert>
    @endif
</x-app>
