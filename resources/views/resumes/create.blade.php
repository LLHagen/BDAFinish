<x-app>
<x-slot name="head">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tiny.cloud/1/cr3ykv765jjxs5y3h6797m6hj4gypjz1ylt54h62dc9wprt9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#resume',
            statusbar: false,
            branding: false,
            mode : "textareas",
            width : "100%",
            height : "800",
            plugin_preview_width : "100%",
            plugin_preview_height : "600",
        });

        tinymce.init({
            selector: '#skills',
            statusbar: false,
            branding: false,
            mode : "textareas",
            width : "100%",
            height : "400",
            plugin_preview_width : "100%",
            plugin_preview_height : "300"
        });

        tinymce.init({
            selector: '#experience',
            statusbar: false,
            branding: false,
            mode : "textareas",
            width : "100%",
            height : "400",
            plugin_preview_width : "100%",
            plugin_preview_height : "300",
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

        <label for="text">Skills</label>
        <textarea id="skills" class="form-control" name="skills" placeholder="skills"></textarea>

        <label for="text">Experience</label>
        <textarea id="experience" class="form-control" name="experience" placeholder="experience"></textarea>

        <label for="text">Resume</label>
        <textarea id="resume" class="form-control" name="resume" placeholder="resume"></textarea>

        <br>
        <input type="submit" class="btn btn-primary mb-2" name="addResume"value="Add Resume">

    </form>
    <br>

    <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>

    <x-alerts.errors />

</x-app>
