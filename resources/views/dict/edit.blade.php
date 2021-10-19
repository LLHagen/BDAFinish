@extends('layouts.app')

@section("content")
    <div class="row justify-content-md-center mt-4">
        <div class="col-md-8">
            <h2>Редактирование справочника: {{ $dict_title ?? "Справочник" }}</h2>

            <x-alerts.errors/>

            <p>ID {{ $item->id }}</p>
            <form method="post" action="{{ route($dict_route.".update",[$dict => $item->id]) }}">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">Название </label>
                    <input class="form-control" type="text" name="name" placeholder="Название" value="{{$item->name}}">
                </div>
                <input type="submit" class="btn btn-primary mb-2" name="editLevel" value="Изменить">
            </form>
        </div>
    </div>

@endsection
