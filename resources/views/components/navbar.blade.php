<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Junior Startup</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                @guest
                    <a class="nav-link" href="{{ URL::to('/resumes/create') }}">Резюме</a>
                @endguest
                @auth
                    <a class="nav-link" href="{{ URL::to('/resumes') }}">Резюме</a>
                @endauth

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Справочники
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ URL::to('/levels') }}">Уровни</a>
                    <a class="dropdown-item" href="{{ URL::to('/vacancies') }}">Должности</a>
                    <a class="dropdown-item" href="{{ URL::to('/statuses') }}">Статусы</a>
                </div>
            </li>
            @auth()
            <li class="nav-item">
                    <form  action="/logout" method="post">
                        @csrf
                        <input class="btn btn-dark mb-2" type="submit" value="Выйти">
                    </form>
            </li>
            @endauth
        </ul>
    </div>
</nav>
