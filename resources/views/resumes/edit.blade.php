<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tiny.cloud/1/cr3ykv765jjxs5y3h6797m6hj4gypjz1ylt54h62dc9wprt9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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

    <h2>Редактирование</h2>
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
                    value="{{$level->id}}"
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
                    value="{{$vacancy->id}}"
                >{{$vacancy->name}}</option>
            @endforeach
        </select>

        <label for="skills">Skills</label>
        <textarea id="skills" class="form-control editor" name="skills" placeholder="skills">{!! $resume->skills !!}</textarea>

        <label for="resume">Resume</label>
        <textarea id="resume" class="form-control editor" name="resume" placeholder="resume">{!! $resume->resume !!}</textarea>

        <label for="text">Experience</label>
        <textarea id="experience" class="form-control editor" name="experience" placeholder="experience">{!! $resume->experience !!}</textarea>

        <br>
        <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>
        <input type="submit"  class="btn btn-outline-primary btn-sm"  name="updateResume" value="Изменить Resume">
        <a href="/resumes/pdf/{{ $resume->id }}"  class="btn btn-outline-primary btn-sm" type="button">
            <img src="{{ '/icon/download.svg' }}" alt="edit" />
        </a>
    </form>

    <x-alerts.errors />
</x-app>
