<x-app>

    <div class="container mt-5">
        <h2 class="text-center mb-3">Laravel Resume</h2>

        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" href="{{ URL::to('/resumes/create') }}">Add resume</a>
        </div>

        <table class="table table-bordered mb-5" id="mytable">
            <thead>
            <tr class="table-danger">
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Level</th>
                <th scope="col">Vacancy</th>
                <th scope="col">Status</th>
                <th scope="col">Date interview</th>
                <th>Nav</th>
            </tr>
            </thead>
            <tbody>

            @foreach($resumes ?? [] as $resume)
                <tr>
                    <th scope="row" class="resume-id" name="id">{{ $resume->id }}</th>
                    <td>{{ $resume->FIO }}</td>
                    <td>{{ $resume->email }}</td>
                    <td>{{ $resume->level->name }}</td>
                    <td>{{ $resume->vacancy->name }}</td>
                    <td>
                        <select class="form-control" name="status_id">
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
    </div>

    <x-alerts.errors />
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
