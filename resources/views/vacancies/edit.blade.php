<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </x-slot>

    <p>ID {{ $vacancy->id }}</p>
    <form action="/levels/{{ $vacancy->id }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Название должности</label>
            <input  class="form-control" type="text" name="name" placeholder="Название" value="{{$vacancy->name}}">
        </div>
        <div class="form-group">
            <label for="name">Описание</label>
            <input  class="form-control" type="text" name="description" placeholder="Описание" value="{{$vacancy->description}}">
        </div>
        <input type="checkbox" name="isActive" {{$vacancy->isActive ? "checked" : ""}}>
        <label for="Active">Активна</label>
        <br>

        <input type="submit" class="btn btn-primary mb-2" name="editVacancy"value="Изменить">
    </form>
    <x-links.link  href="/vacancies" name="Назад" />
    <x-alerts.errors />
</x-app>
