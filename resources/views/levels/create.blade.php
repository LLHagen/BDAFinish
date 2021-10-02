<x-app>
    <h2>Add levels</h2>
    <br>
    <form class="form-group" action="/levels" method="post">
        @csrf
        <label for="name">Level name</label>
        <input  class="form-control" type="text" name="name" placeholder="Level"><br>
        <input type="submit" class="btn btn-primary mb-2" name="addLevel"value="Add Level">
    </form>
    <x-alerts.errors />

    @if($levels)
            <ul>
                @foreach($levels as $level)
                    <li>
                        {{$level->name}}
                        <a href="/levels/{{$level->id}}/edit" class="btn btn-outline-primary btn-sm" type="button">edit</a>
                        <form class="form-group d-inline" action="/levels/{{$level->id}}" method="post">
                            @csrf
                            @method('delete')
                            <input
                                class="btn btn-outline-primary btn-sm"
                                type="submit"
                                name="delete"
                                value="&times;">
                            <br>
                        </form>
                    </li>
                @endforeach
            </ul>
    @endif
    <br>
    <x-links.link  href="/resumes" name="Resumes" />
</x-app>
