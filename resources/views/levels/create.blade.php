<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/font-awesome.min.css">
    </x-slot>

    <x-navbar />

    <div class="container mt-5">
        <h2>Уровни</h2>
        <br>
        <form action="/levels" method="post">
            <div class="form-group">
                @csrf
                <label for="name">Название уровня</label>
                <input  class="form-control" type="text" name="name" placeholder="Название"><br>
            </div>
            <input type="submit" class="btn btn-primary mb-2" name="addLevel" value="Добавить">
        </form>

        <x-alerts.errors />

        @if($levels)
            <ul>
                @foreach($levels as $level)
                    <li>
                        {{$level->name}}
                        <a href="/levels/{{$level->id}}/edit" class="btn btn-outline-primary btn-sm" type="button"><img src="{{ '/icon/edit.svg' }}" alt="edit" /></a>
                        <x-forms.delete action="/levels/{{$level->id}}" />
                    </li>
                @endforeach
            </ul>
        @endif
        <br>
    </div>
</x-app>
