@extends('layouts.app')

@section("content")
    <div class="row justify-content-md-center mt-4">
        <div class="col-md-5">
            <h2>{{ $dict_title ?? "Справочник" }}</h2>
            <br>
            <form method="post">
                <div class="form-group">
                    @csrf
                    <label for="name">Значение</label>
                    <input class="form-control" required type="text" name="name" placeholder="Значение"><br>
                </div>
                <input type="submit" class="btn btn-primary mb-2" name="addLevel" value="Добавить">
            </form>

            <x-alerts.errors/>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-5">
            <ul class="list-group ">
                @if($items)
                    @foreach($items as $item)
                        <li class="list-group-item" id="item-{{ $item->id }}">
                            <div class="d-flex justify-content-between">
                                <span>#{{$item->id}}&nbsp;&nbsp;{{$item->name}}</span>
                                <span>
                                    <a href="{{ route($dict_route.'.edit',[ $dict => $item->id]) }}"
                                       class="btn btn-outline-primary btn-sm"
                                       type="button">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" data-id="{{ $item->id }}"
                                       data-action="{{ route($dict_route.'.destroy',[$dict=>$item->id]) }}"
                                       class="btn btn-outline-danger btn-sm btn-delete"
                                       type="button" data-toggle="modal" data-target="#confirm-delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    </span>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.btn-confirm').click(function () {
                let token = $("meta[name='csrf-token']").attr('content');

                let el = $(this);

                fetch(el.data('action'), {
                    method: 'DELETE',
                    headers: {
                        "X-CSRF-Token": token
                    }
                }).then(function () {
                    $('#item-' + el.data('id')).remove();
                    $('#confirm-delete').modal('hide');
                });
            });

            $('#confirm-delete').on('show.bs.modal', function (e) {
                $(this).find('.btn-confirm').data('action', $(e.relatedTarget).data('action'));
                $(this).find('.btn-confirm').data('id', $(e.relatedTarget).data('id'));
            });

        });
    </script>


    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Подтвердите удаление
                </div>
                <div class="modal-body">
                    Вы действительно хотите удалить значение справочника?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <a class="btn btn-danger btn-confirm">Удалить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
