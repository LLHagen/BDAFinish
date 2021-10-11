<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tiny.cloud/1/cr3ykv765jjxs5y3h6797m6hj4gypjz1ylt54h62dc9wprt9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>

            tinymce.init({
                selector: '#mytextarea',
                statusbar: false,
                branding: false,
                mode : "textareas",
                width : "100%",
                height : "800",
                plugin_preview_width : "100%",
                plugin_preview_height : "600",
                setup: function (editor) {
                    editor.on('init', function (e) {
                        //this gets executed AFTER TinyMCE is fully initialized
                        editor.setContent('{!!     str_replace(array("\r\n", "\r", "\n"), '', htmlspecialchars_decode($resume->text))  !!}');
                    });
                }
            });
        </script>
    </x-slot>

    <h2>Add resumes</h2>
    <br>
    <form action="/resumes/{{ $resume->id }}" method="post">
        @csrf
        @method('patch')
        <label for="FIO">FIO</label>
        <input  class="form-control" type="text" name="FIO" placeholder="FIO" value="{{ $resume->FIO }}">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $resume->email }}">

        <label for="level_id">level_id</label>
        <select class="form-control" name="level_id">
            @foreach($levels as $level)
                <option
                    @if($resume->level_id == $level->id)
                        selected="selected"
                    @endif
                >
                        {{$level->name}}
                </option>
            @endforeach
        </select>

        <label for="vacancy_id">vacancy_id</label>
        <select class="form-control"  name="vacancy_id">
            @foreach($vacancies as $vacancy)
                <option
                    @if($resume->vacancy_id == $vacancy->id)
                    selected="selected"
                    @endif
                >{{$vacancy->name}}</option>
            @endforeach
        </select>

        <label for="text">Text Resume</label>
        <textarea id="mytextarea" class="form-control" name="text" placeholder="text">
        </textarea>

        <input type="submit"  class="btn btn-primary mb-2"  name="updateResume" value="Изменить Resume">
    </form>
    <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>
    <x-alerts.errors />
</x-app>
