<x-app>
    <h1>List of todos</h1>

    <a href="/resumes/create" class="btn btn-outline-primary p-1" >Добавить Resume</a>

    <ul class="nav flex-column ">
        @foreach($resumes as $resume)
            <li class="nav-item">
                <a class="btn link-secondary" href="/resumes/{{$resume->id}}">
                    {{$resume->id}} {{$resume->text}}
                </a>
                <a href="/resumes/{{$resume->id}}/edit" class="btn btn-outline-primary btn-sm" type="button">edit</a>

                <form class="form-group d-inline" action="/resumes/{{$resume->id}}" method="post">
                    @csrf
                    @method('delete')
                    <input
                        class="btn btn-outline-primary btn-sm"
                        type="submit"
                        name="delete"
                        id="{{$resume->id}}"
                        value="&times;">
                    <br>
                </form>
            </li>
        @endforeach
    </ul>

</x-app>
