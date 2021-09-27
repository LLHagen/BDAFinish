<x-app>
    <p>Add resumes</p>
    <form action="/resumes"  id="addResume" method="post">
        @csrf
        <input type="text" name="resume" id="resume">
        <input type="submit" name="addResume"value="Add Resume">
    </form>
    <a href="/resumes">Назад</a>

    <div id="error_message"></div>
{{--    <script>--}}
{{--        $('#addTodo').on('submit', function (e){--}}
{{--            e.preventDefault();--}}
{{--            let token = $('input[name="_token"]').val();--}}
{{--            let todo = $('#todo').val();--}}
{{--            let is_done = $('#is_done').is(':checked');--}}

{{--            if (todo != 'qwe'){--}}
{{--                $.ajax({--}}
{{--                    url: '/todos',--}}
{{--                    type: "POST",--}}
{{--                    data: {_token:token,todo:todo,is_done:is_done},--}}
{{--                    success: function (data) {--}}
{{--                        console.log(data);--}}
{{--                        let errorsHtml = '<div class="alert alert-success">Todo добавлен</div>';--}}
{{--                        $( '#error_message' ).html( errorsHtml ).delay(2000).show(function() {--}}
{{--                            $( '#error_message' ).empty();--}}
{{--                        })--}}
{{--                    },--}}
{{--                    error: function(data){--}}
{{--                        let errors = data.responseJSON;--}}
{{--                        let errorsHtml = '<div class="alert alert-danger"><ul>';--}}
{{--                        $.each(errors.errors,function (key,value) {--}}
{{--                            errorsHtml += '<li>'+ value + '</li>';--}}
{{--                        });--}}
{{--                        errorsHtml += '</ul></div>';--}}
{{--                        $( '#error_message' ).html( errorsHtml ).delay(2000).show(function() {--}}
{{--                            $( '#error_message' ).empty();--}}
{{--                        })--}}
{{--                        ;--}}

{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
</x-app>
