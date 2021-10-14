<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </x-slot>

    <p>ID {{ $status->id }}</p>
    <form action="/levels/{{ $status->id }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Название статуса</label>
            <input  class="form-control" type="text" name="name" placeholder="Название" value="{{$status->name}}">
        </div>
        <input type="submit" class="btn btn-primary mb-2" name="editStatus"value="Изменить">
    </form>
    <x-links.link  href="/statuses" name="Назад" />
    <x-alerts.errors />
</x-app>
