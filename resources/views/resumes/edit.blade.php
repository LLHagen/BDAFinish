<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <x-head.tinymce-config />
    </x-slot>

    <h2>Редактирование</h2>
    <br>
    <form action="/resumes/{{ $resume->id }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="FIO">Фамилия, имя, отчество</label>
            <input  class="form-control" type="text" name="FIO" placeholder="ФИО" value="{{ $resume->FIO }}">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="E-mail" value="{{ $resume->email }}">
        </div>
        <div class="form-group">
            <label for="level_id">Уровень</label>
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
        </div>
        <div class="form-group">
            <label for="vacancy_id">Вакансия</label>
            <select class="form-control"  name="vacancy_id">
                @foreach($vacancies as $vacancy)
                    <option
                        @if($resume->vacancy_id == $vacancy->id)
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
            <label for="skills">Навыки</label>
            <textarea id="skills" class="form-control editor" name="skills" placeholder="Навыки">{!! $resume->skills !!}</textarea>
        </div>
        <div class="form-group">
            <label for="resume">Резюме</label>
            <textarea id="resume" class="form-control editor" name="resume" placeholder="Резюме">{!! $resume->resume !!}</textarea>
        </div>
        <div class="form-group">
            <label for="text">Опыт</label>
            <textarea id="experience" class="form-control editor" name="experience" placeholder="Опыт">{!! $resume->experience !!}</textarea>
        </div>

        <br>
        <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>
        <input type="submit"  class="btn btn-outline-primary btn-sm"  name="updateResume" value="Изменить">
        <a href="/resumes/pdf/{{ $resume->id }}"  class="btn btn-outline-primary btn-sm" type="button">
            <img src="{{ '/icon/download.svg' }}" alt="edit" />
        </a>
    </form>

    <x-alerts.errors />
</x-app>
