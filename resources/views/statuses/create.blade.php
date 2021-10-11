<x-app>
    <h2>Add statuses</h2>
    <br>
    <form class="form-group" action="/statuses" method="post">
        @csrf
        <label for="name">Status name</label>
        <input  class="form-control" type="text" name="name" placeholder="Status"><br>
        <input type="submit" class="btn btn-primary mb-2" name="addStatus"value="Add Status">
    </form>
    <x-alerts.errors />

    @if($statuses)
            <ul>
                @foreach($statuses as $status)
                    <li>
                        {{$status->name}}
                        <a href="/statuses/{{$status->id}}/edit" class="btn btn-outline-primary btn-sm" type="button">edit</a>
                        <x-forms.delete action="/statuses/{{$status->id}}" />
                    </li>
                @endforeach
            </ul>
    @endif
    <br>
    <x-links.link  href="/resumes" name="Resumes" />
</x-app>
