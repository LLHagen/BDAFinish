<x-app>
    <h2>Add resumes</h2>
    <br>
    <form class="form-group" action="/resumes" method="post">
        @csrf
        <label for="FIO">FIO</label>
        <input  class="form-control" type="text" name="FIO" placeholder="FIO">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">

        <label for="level_id">level_id</label>
        <select class="form-control" name="level_id">
            @foreach($levels as $level)
                <option>{{$level->name}}</option>
            @endforeach
        </select>

        <label for="vacancy_id">vacancy_id</label>
        <select class="form-control"  name="vacancy_id">
            @foreach($vacancies as $vacancy)
                <option>{{$vacancy->name}}</option>
            @endforeach
        </select>

        <label for="text">Text Resume</label>
        <textarea class="form-control" name="text" placeholder="text"></textarea>

        <input type="submit" class="btn btn-primary mb-2" name="addResume"value="Add Resume">
    </form>
    <a href="/resumes">Назад</a>


    <x-alerts.errors />
</x-app>
