<x-app title="{{$resume->FIO}}">

    <h1>{{$resume->FIO}}</h1>
    <p>{{$resume->email}}</p>
    <h2>{{$resume->vacancy->name}}</h2>


    {!! $resume->skills !!}
    {!! $resume->resume !!}
    {!! $resume->experience !!}

    <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>
    <a href="/resumes/{{$resume->id}}/edit" class="btn btn-outline-primary btn-sm" type="button">Редактировать</a>
    <a href="/resumes/pdf/{{ $resume->id }}"  class="btn btn-outline-primary btn-sm" type="button">
        <img src="{{ '/icon/download.svg' }}" alt="edit" />
    </a>
</x-app>

