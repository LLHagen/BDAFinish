<x-app>
    <p>Resumes {{ $resume->id }}</p>

    <form action="/resumes/{{ $resume->id }}" method="post">
        @csrf
        @method('patch')
        <input type="text" name="resume" value="{{ $resume->FIO }}">
        <input type="submit" name="updateResume"value="Изменить Resume">
    </form>

    <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>

    <x-alerts.errors />
</x-app>
