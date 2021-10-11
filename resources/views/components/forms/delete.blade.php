<form class="form-group d-inline" action="{{$action}}" method="post">
    @csrf
    @method('delete')
    <input
        class="btn btn-outline-primary btn-sm"
        type="submit"
        name="delete"
        value="&times;">
    <br>
</form>
