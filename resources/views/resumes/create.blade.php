<x-app>
    <p>Add resumes</p>
    <form class="form-group" action="/resumes"  id="addResume" method="post">
        @csrf
        <input type="text" name="FIO" id="FIO">
        <input type="email" name="email" id="email">
        <input type="text" name="text" id="text">
        <input type="text" name="status_id" id="status_id">
        <input type="text" name="interview_date" id="interview_date">
        <input type="submit" name="addResume"value="Add Resume">
    </form>
    <a href="/resumes">Назад</a>

    <div id="error_message"></div>
</x-app>
