<x-app>
    <p>Vacancy {{ $vacancy->id }}</p>
    <form action="/vacancies/{{ $vacancy->id }}" method="post">
        @csrf
        @method('patch')
        <label for="name">Vacancy name</label>
        <input  class="form-control" type="text" name="name" placeholder="Vacancy" value="{{$vacancy->name}}">
        <label for="name">Description name</label>
        <input  class="form-control" type="text" name="description" placeholder="Description" value="{{$vacancy->description}}">
        <input type="submit" class="btn btn-primary mb-2" name="editVacancy"value="Edit Vacancy">
    </form>
    <x-links.link  href="/vacancies" name="vacancies" />
    <x-alerts.errors />
</x-app>
