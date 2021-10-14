<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tiny.cloud/1/cr3ykv765jjxs5y3h6797m6hj4gypjz1ylt54h62dc9wprt9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script>
            tinymce.init({
                selector: ".editor",
                statusbar: false,
                branding: false,
                width : "100%",
                height : "400",
                plugin_preview_width : "100%",
                plugin_preview_height : "600",
                theme_advanced_resizing : true,
            });
        </script>
    </x-slot>

    <h2>Добавить резюме</h2>
    <br>

   <form  action="/resumes" method="post">
        <div class="form-group">
            @csrf
            <label for="FIO">Фамилия, имя, отчество</label>
            <input class="form-control" type="text" name="FIO" placeholder="ФИО" value="{{ old('FIO') }}">
        </div>
        
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="E-mail" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="level_id">Уровень</label>
            <select class="form-control" name="level_id">
                @foreach($levels as $level)
                    <option
                        @if(old('level_id') == $level->id)
                        selected="selected"
                        @endif
                        value="{{$level->id}}"
                    >
                        {{$level->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vacancy_id">Должность</label>
            <select class="form-control"  name="vacancy_id">
                @foreach($vacancies as $vacancy)
                    <option
                        @if(old('vacancy_id') == $vacancy->id)
                        selected="selected"
                        @endif
                        value="{{$vacancy->id}}"
                    >
                        {{$vacancy->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="text">Skills</label>
            <textarea id="skills"  class="form-control editor"  name="skills" placeholder="skills">{!! old('skills') !!}</textarea>
        </div>
        <div class="form-group">
            <label for="text">Resume</label>
            <textarea id="resume"  class="form-control editor"  name="resume" placeholder="resume">{!! old('resume') !!}</textarea>
        </div>
        <div class="form-group">
            <label for="text">Experience</label>
            <textarea id="experience"  class="form-control editor"  name="experience" placeholder="experience">{!! old('experience') !!}</textarea>
        </div>
        <input type="submit" class="btn btn-primary mb-2" name="addResume"value="Добавить">
    </form>

    <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>

    <x-alerts.errors />

</x-app>