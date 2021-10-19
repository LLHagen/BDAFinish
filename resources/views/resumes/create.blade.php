@extends("layouts.app")

@section("content")
    <x-head.tinymce-config/>
    <div class="row">
        <div class="col-md-12">

            <h2>Новое резюме</h2>
            <br>

            <form action="/resumes" method="post">
                <div class="form-group">
                    @csrf
                    <label for="FIO">Фамилия, имя, отчество</label>
                    <input class="form-control" type="text" name="FIO" placeholder="ФИО" value="{{ old('FIO') }}">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                           placeholder="E-mail"
                           value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="status_id">Статус</label>
                    <select class="form-control" name="status_id">
                        @foreach($statuses as $id=>$name)
                            <option
                                    @if($resume->status_id == $name)
                                    selected="selected"
                                    @endif
                                    value="{{ $id }}"
                            >
                                {{$name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="level_id">Уровень</label>
                    <select class="form-control" name="level_id">
                        @foreach($levels as $id=>$name)
                            <option
                                    @if($resume->level_id == $name)
                                    selected="selected"
                                    @endif
                                    value="{{ $id }}"
                            >
                                {{$name}}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="vacancy_id">Позиция</label>
                    <select class="form-control" name="vacancy_id">
                        @foreach($vacancies as $id=>$name)
                            <option
                                    @if($resume->vacancy_id == $name)
                                    selected="selected"
                                    @endif
                                    value="{{ $id }}"
                            >
                                {{$name}}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Skills</label>
                    <textarea id="skills" class="form-control editor" name="skills"
                              placeholder="skills">{!! old('skills') !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="text">Resume</label>
                    <textarea id="resume" class="form-control editor" name="resume"
                              placeholder="resume">{!! old('resume') !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="text">Experience</label>
                    <textarea id="experience" class="form-control editor" name="experience"
                              placeholder="experience">{!! old('experience') !!}</textarea>
                </div>
                <input type="submit" class="btn btn-primary mb-2" name="addResume" value="Добавить">
            </form>

            <a href="/resumes" class="btn btn-outline-primary btn-sm" type="button">Назад</a>
            <x-alerts.errors/>
            <script>
                function transliterate(word) {
                    let answer = "";
                    let a = {};
                    a["Ё"] = "YO";
                    a["Й"] = "I";
                    a["Ц"] = "TS";
                    a["У"] = "U";
                    a["К"] = "K";
                    a["Е"] = "E";
                    a["Н"] = "N";
                    a["Г"] = "G";
                    a["Ш"] = "SH";
                    a["Щ"] = "SCH";
                    a["З"] = "Z";
                    a["Х"] = "H";
                    a["Ъ"] = "";
                    a["ё"] = "yo";
                    a["й"] = "i";
                    a["ц"] = "ts";
                    a["у"] = "u";
                    a["к"] = "k";
                    a["е"] = "e";
                    a["н"] = "n";
                    a["г"] = "g";
                    a["ш"] = "sh";
                    a["щ"] = "sch";
                    a["з"] = "z";
                    a["х"] = "h";
                    a["ъ"] = "";
                    a["Ф"] = "F";
                    a["Ы"] = "I";
                    a["В"] = "V";
                    a["А"] = "a";
                    a["П"] = "P";
                    a["Р"] = "R";
                    a["О"] = "O";
                    a["Л"] = "L";
                    a["Д"] = "D";
                    a["Ж"] = "ZH";
                    a["Э"] = "E";
                    a["ф"] = "f";
                    a["ы"] = "i";
                    a["в"] = "v";
                    a["а"] = "a";
                    a["п"] = "p";
                    a["р"] = "r";
                    a["о"] = "o";
                    a["л"] = "l";
                    a["д"] = "d";
                    a["ж"] = "zh";
                    a["э"] = "e";
                    a["Я"] = "Ya";
                    a["Ч"] = "CH";
                    a["С"] = "S";
                    a["М"] = "M";
                    a["И"] = "I";
                    a["Т"] = "T";
                    a["Ь"] = "";
                    a["Б"] = "B";
                    a["Ю"] = "YU";
                    a["я"] = "ya";
                    a["ч"] = "ch";
                    a["с"] = "s";
                    a["м"] = "m";
                    a["и"] = "i";
                    a["т"] = "t";
                    a["ь"] = "";
                    a["б"] = "b";
                    a["ю"] = "yu";

                    for (i in word) {
                        if (word.hasOwnProperty(i)) {
                            if (a[word[i]] === undefined) {
                                answer += word[i];
                            } else {
                                answer += a[word[i]];
                            }
                        }
                    }
                    return answer;
                }

                let FIO = $("input[name='FIO']");

                FIO.change(function () {
                    let name = transliterate($(this).val());
                    let email = $("input[name='email']");

                    let nameArray = name.split(" ");
                    let nameResult = nameArray[0] + '.' + nameArray[1][0] + '-dev{!! env('MAIL_PREFIX') !!}';

                    if (email.val() == '') {
                        email.val(nameResult);
                    }
                });
            </script>
        </div>
    </div>
@endsection
