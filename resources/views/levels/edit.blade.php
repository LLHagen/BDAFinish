<x-app>
    <p>Level {{ $level->id }}</p>
    <form action="/levels/{{ $level->id }}" method="post">
        @csrf
        @method('patch')
        <label for="name">Level name</label>
        <input  class="form-control" type="text" name="name" placeholder="Level" value="{{$level->name}}">
        <input type="submit" class="btn btn-primary mb-2" name="editLevel"value="Edit Level">
    </form>
    <x-links.link  href="/levels" name="levels" />
    <x-alerts.errors />
</x-app>
