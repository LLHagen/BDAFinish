<x-app title="{{$resume->FIO}}">
    <h1>{{$resume->FIO}}</h1>
    <h2>{{$resume->vacancy->name}}</h2>


        <label for="FIO">FIO</label>
        {!! $resume->text!!}





        <label for="level_id">level_id</label>


        <label for="vacancy_id">vacancy_id</label>


<br>
    <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>
    <x-alerts.errors />

















    <a href="/resumes"  class="btn btn-outline-primary btn-sm" type="button">Назад</a>
    <a href="/resumes/{{$resume->id}}/edit" class="btn btn-outline-primary btn-sm" type="button">Редактировать</a>
</x-app>

