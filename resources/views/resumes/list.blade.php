@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col">
            <h2 class="text-center mb-3">Резюме</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary" href="{{ URL::to('/resumes/create') }}">Добавить</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-alerts.errors/>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <form class="form-inline" method="GET">
                <div class="form-group mb-2">
                    <label for="filter" class="col-sm-3 col-form-label">Поиск</label>
                    <input type="text" class="form-control" id="filter" name="filter" placeholder="Product name..." value="{{$filter}}">
                </div>
                <button type="submit" class="btn btn-default mb-2">Искать</button>
            </form>


            <table class="table table-stripped table-responsive" id="mytable">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">@sortablelink('FIO', 'ФИО')</th>
                    <th scope="col">@sortablelink('email', 'E-mail')</th>
                    <th scope="col">@sortablelink('level_id', 'Уровень')</th>
                    <th scope="col">@sortablelink('vacancy_id', 'Должность')</th>
                    <th scope="col">@sortablelink('status_id', 'Статус')</th>
                    <th scope="col">@sortablelink('interview_date', 'Дата собеседования')</th>
                    <th scope="col">Навигация</th>
                </tr>
                </thead>
                <tbody>
                @if(count($resumes) > 0)
                    @foreach($resumes ?? [] as $resume)
                        <tr id="item-{{ $resume->id }}">
                            <td class="d-none">
                                <div class="resume-id">{{ $resume->id }}</div>
                            </td>
                            <td>{{ $resume->FIO }}</td>
                            <td>{{ $resume->email }}</td>
                            <td>{{ $resume->level->name }}</td>
                            <td>{{ $resume->vacancy->name }}</td>
                            <td >
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
                                </select>
                            </td>
                            <td>
                                <input
                                        id="datetimepicker"
                                        type="text"
                                        class="form-control datetimepicker"
                                        name="date"
                                        value="{{ $resume->InterviewDateFormatted ?? '' }}">

                            </td>
                            <td class="nav-btn-container" style="white-space: nowrap">
                                <a href="/resumes/{{ $resume->id }}" class="btn btn-outline-primary btn-sm" type="button">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="/resumes/pdf/{{ $resume->id }}" class="btn btn-outline-primary btn-sm"
                                   type="button"><i class="fa fa-download"></i>
                                </a>
                                <a href="{{ route('resumes.edit',['resume'=>$resume->id]) }}"
                                   class="btn btn-outline-primary btn-sm"
                                   type="button"><i class="fa fa-pencil"></i></a>
                                <a href="#" data-id="{{$resume->id}}"
                                   class="btn btn-outline-danger btn-sm btn-delete"
                                   type="button" data-toggle="modal" data-target="#confirm-delete">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td><p>Поиск не дал результатов...</p></td></tr>
                @endif
                </tbody>
            </table>
            @if(!empty($resumes->links))
                {{ $resumes->links('vendor.pagination.bootstrap-4') }}
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function () {

            jQuery.datetimepicker.setLocale('ru');

            jQuery('.datetimepicker').datetimepicker({
                format: 'd.m.y H:i',
                lang: 'ru'
            });

            $('#confirm-delete').on('show.bs.modal', function (e) {
                $(this).find('.btn-confirm').data('id', $(e.relatedTarget).data('id'));
            });

            @if(!empty($resume->id))
                $('.btn-confirm').click(function () {
                    let token = $("meta[name='csrf-token']").attr('content');
                    let el = $(this);

                    fetch('{{ route('resumes.destroy',['resume'=>$resume->id]) }}', {
                        method: 'DELETE',
                        headers: {
                            "X-CSRF-Token": token
                        }
                    }).then(function () {
                        $('#item-' + el.data('id')).remove();
                        $('#confirm-delete').modal('hide');
                    });
                });
            @endif
            let date = $(".datetimepicker");

            date.change(function () {
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

            input.change(function () {
                let data = {};
                data.resume = $(this).parent().parent().find(".resume-id").text();
                data.status = this.value;
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


        });
    </script>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Подтвердите удаление</div>
                <div class="modal-body">Вы действительно хотите удалить резюме?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <a class="btn btn-danger btn-confirm">Удалить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
