<x-app>
<x-slot name="head">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tiny.cloud/1/cr3ykv765jjxs5y3h6797m6hj4gypjz1ylt54h62dc9wprt9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            statusbar: false,
            branding: false
        });
    </script>
</x-slot>

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
        <textarea id="mytextarea" class="form-control" name="text" placeholder="text"></textarea>

        <input type="submit" class="btn btn-primary mb-2" name="addResume"value="Add Resume">

    </form>
    <a href="/resumes">Назад</a>


    <x-alerts.errors />

</x-app>
