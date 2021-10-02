<x-app>
    <p>Status {{ $status->id }}</p>
    <form action="/statuses/{{ $status->id }}" method="post">
        @csrf
        @method('patch')
        <label for="name">Status name</label>
        <input  class="form-control" type="text" name="name" placeholder="Status" value="{{$status->name}}">
        <input type="submit" class="btn btn-primary mb-2" name="editStatus"value="Edit Status">
    </form>
    <x-links.link  href="/statuses" name="statuses" />
    <x-alerts.errors />
</x-app>
