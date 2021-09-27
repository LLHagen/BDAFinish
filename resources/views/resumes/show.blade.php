<x-app title="{{$resume->FIO}}">
    <h1>[{{$resume->id}}]{{$resume->FIO}}</h1>
    <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>
    <a href="/resumes/{{$resume->id}}/edit" class="btn btn-outline-primary btn-sm" type="button">Редактировать</a>
</x-app>

