<x-app>
    <h2>Add Vacancies</h2>
    <br>
    <form class="form-group" action="/vacancies" method="post">
        @csrf
        <label for="name">Vacancy name</label>
        <input  class="form-control" type="text" name="name" placeholder="Vacancy"><br>
        <label for="description">Description name</label>
        <input  class="form-control" type="text" name="description" placeholder="Description"><br>
        <input type="submit" class="btn btn-primary mb-2" name="addVacancy"value="Add Vacancy">
    </form>
    <x-alerts.errors />

    @if($vacancies)
            <ul>
                @foreach($vacancies as $vacancy)
                    <li>
                        {{$vacancy->name}}  {{$vacancy->isActive ? "(activ)" : ""}}
                        <a href="/vacancies/{{$vacancy->id}}/edit" class="btn btn-outline-primary btn-sm" type="button">edit</a>
                        <x-forms.delete action="/vacancies/{{$vacancy->id}}" />
                    </li>
                @endforeach
            </ul>
    @endif
    <br>
    <x-links.link  href="/resumes" name="Resumes" />
</x-app>
