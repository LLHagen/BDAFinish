<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/font-awesome.min.css">
    </x-slot>

    <x-navbar />

    <div class="container mt-5">
        <h2>Статусы</h2>
        <br>
        <form action="/statuses" method="post">
            <div class="form-group">
                @csrf
                <label for="name">Название статуса</label>
                <input  class="form-control" type="text" name="name" placeholder="Статус"><br>
            </div>
            <input type="submit" class="btn btn-primary mb-2" name="addStatus"value="Добавить">
        </form>
        <x-alerts.errors />

        @if($statuses)
                <ul>
                    @foreach($statuses as $status)
                        <li>
                            {{$status->name}}
                            <a href="/statuses/{{$status->id}}/edit" class="btn btn-outline-primary btn-sm" type="button">
                                <img src="{{ '/icon/edit.svg' }}" alt="edit" />
                            </a>
                            <x-forms.delete action="/statuses/{{$status->id}}" />
                        </li>
                    @endforeach
                </ul>
        @endif
    </div>
</x-app>
