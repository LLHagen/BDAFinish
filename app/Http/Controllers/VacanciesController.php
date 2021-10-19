<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Resume;
use App\Models\Status;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacanciesController extends DictController
{
    protected $title = "Позиции";
    protected $dictionary = "vacancy";
    protected $route = "vacancies";
    protected $model = Vacancy::class;
}
