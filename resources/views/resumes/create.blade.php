<x-app>
<x-slot name="head">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <x-head.tinymce-config />

</x-slot>

    <h2>Add resumes</h2>
    <br>
    <form class="form-group" action="/resumes" method="post">
        @csrf
        <label for="FIO">FIO</label>
        <input  class="form-control" type="text" name="FIO" placeholder="FIO" value="{{ old('FIO') }}">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">

        <label for="level_id">level_id</label>
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

        <label for="vacancy_id">vacancy_id</label>
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

        <label for="text">Skills</label>
        <textarea id="skills"  class="form-control editor"  name="skills" placeholder="skills">{!! old('skills') !!}</textarea>

        <label for="text">Resume</label>
        <textarea id="resume"  class="form-control editor"  name="resume" placeholder="resume">{!! old('resume') !!}</textarea>

        <label for="text">Experience</label>
        <textarea id="experience"  class="form-control editor"  name="experience" placeholder="experience">{!! old('experience') !!}</textarea>

        <br>
        <input type="submit" class="btn btn-primary mb-2" name="addResume"value="Add Resume">

    </form>
    <br>

    <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>

    <x-alerts.errors />

</x-app>
