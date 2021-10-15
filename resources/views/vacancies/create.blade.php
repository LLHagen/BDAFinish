<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/font-awesome.min.css">
    </x-slot>

    <x-navbar />

    <div class="container mt-5">
        <h2>Должности</h2>
        <br>
        <form class="form-group" action="/vacancies" method="post">
            <div class="form-group">
                @csrf
                <label for="name">Название должности</label>
                <input  class="form-control" type="text" name="name" placeholder="Название"><br>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <input  class="form-control" type="text" name="description" placeholder="Описание"><br>
            </div>
            <input type="submit" class="btn btn-primary mb-2" name="addVacancy" value="Добавить">
        </form>
        <x-alerts.errors />

        @if($vacancies)
                <ul>
                    @foreach($vacancies as $vacancy)
                        <li>
                            {{$vacancy->name}}  {{$vacancy->isActive ? "(activ)" : ""}}
                            <a href="/vacancies/{{$vacancy->id}}/edit" class="btn btn-outline-primary btn-sm" type="button">
                                <img src="{{ '/icon/edit.svg' }}" alt="edit" />
                            </a>
                            <x-forms.delete action="/vacancies/{{$vacancy->id}}" />
                        </li>
                    @endforeach
                </ul>
        @endif
    </div>
</x-app>
