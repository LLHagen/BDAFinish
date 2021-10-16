<x-app>
    <x-slot name="head">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/font-awesome.css">
    </x-slot>

    <x-navbar></x-navbar>


    <div class="container mt-5">
        <h2 class="text-center mb-3">Резюме</h2>

        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" href="{{ URL::to('/resumes/create') }}">Добавить</a>
        </div>
        <x-alerts.errors />



        <div class="table-responsive-sm">


            <table class="table table-bordered table-sm table-hover mb-5 table-responsive" id="mytable">

                <thead>
                <tr class="table-danger">
                    <th scope="col">@sortablelink('FIO', 'ФИО')</th>
                    <th scope="col">@sortablelink('email', 'E-mail')</th>
                    <th scope="col">@sortablelink('level_id', 'Уровень')</th>
                    <th scope="col">@sortablelink('vacancy_id', 'Должность')</th>
                    <th scope="col">@sortablelink('status_id', 'Статус')</th>
                    <th scope="col">@sortablelink('interview_date', 'Дата собеседования')</th>
                    <th scope="col">@sortablelink('created_at', 'Дата подачи резюме')</th>
                    <th scope="col">Навигация</th>
                </tr>
                </thead>
                <tbody>

                @foreach($resumes ?? [] as $resume)
                    <tr>
                        <td class="d-none"><div class="resume-id">{{ $resume->id }}</div></td>
                        <td>{{ $resume->FIO }}</td>
                        <td>{{ $resume->email }}</td>
                        <td>{{ $resume->level->name }}</td>
                        <td>{{ $resume->vacancy->name }}</td>
                        <td>
                            <select class="form-control" name="status_id" id="status_id">
                                @foreach($statuses as $status)
                                    <option
                                        @if($resume->status_id == $status->id)
                                        selected="selected"
                                        @endif
                                    >
                                        {{$status->name}}
                                    </option>
                                @endforeach
                            </select></td>
                        <td>
                            <input
                                id="party"
                                type="datetime-local"
                                class="date-time"
                                name="date"
                                value="{{ $resume->InterviewDateFormatted }}">
                        </td>
                        <td>
                            {{ $resume->created_at }}
                        </td>
                        <td  class="nav-btn-container">
                            <a href="/resumes/{{ $resume->id }}"  class="btn btn-outline-primary btn-sm" type="button">
                                <img src="{{ '/icon/show.svg' }}" alt="edit" />
                            </a>
                            <a href="/resumes/pdf/{{ $resume->id }}"  class="btn btn-outline-primary btn-sm" type="button">
                                <img src="{{ '/icon/download.svg' }}" alt="edit" />
                            </a>
                            <a href="/resumes/{{$resume->id}}/edit" class="btn btn-outline-primary btn-sm" type="button">
                                <img src="{{ '/icon/edit.svg' }}" alt="edit" />
                            </a>

                            <form class="form-group d-inline" action="/resumes/{{$resume->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button
                                    class="btn btn-outline-primary btn-sm btn-delete"
                                    type="submit"
                                    name="delete"
                                    id="{{$resume->id}}"
                                    value=""><img src="{{ '/icon/delete.svg' }}" alt="delete" /></button>
                                <br>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        {{ $resumes->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    <script>

        let date = $(".date-time");
        date.change(function() {
            let date = {};
            date.date = this.value;
            date.resume = $(this).parent().parent().find(".resume-id").text();

            $.ajax({
                url: '/resumes/interview/',
                type: "patch",
                data: date,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });

        let input = $("select[name='status_id']");

        input.change(function() {
            let data = {};
            data.resume = $(this).parent().parent().find(".resume-id").text();
            data.status = this.value;

            console.log(data);
            $.ajax({
                url: '/resumes/status',
                type: "patch",
                data: data,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        })

    </script>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</x-app>
