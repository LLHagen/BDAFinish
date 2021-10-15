<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </x-slot>

    <p>ID {{ $level->id }}</p>
    <form action="/levels/{{ $level->id }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Название уровня</label>
            <input  class="form-control" type="text" name="name" placeholder="Название" value="{{$level->name}}">
        </div>
        <input type="submit" class="btn btn-primary mb-2" name="editLevel" value="Изменить">
    </form>
    <x-links.link  href="/levels" name="Назад" />
    <x-alerts.errors />
</x-app>
