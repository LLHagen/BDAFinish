@extends("layouts.pdf")
@section('content')

    <h1>{{ $resume->FIO }}</h1>
    <div class="mailto"><span><a href="mailto:{{ $resume->email }}">{{ $resume->email }}</a></span></div>
    <div class="section">
        <h3>Ключевые навыки</h3>
        {!! $resume->skills !!}
    </div>
    <div class="section">
        <h3>Резюме</h3>
        {!! $resume->resume !!}
    </div>
    <div class="section">
        <h3>Опыт</h3>
        {!! $resume->experience !!}
    </div>
@endsection
