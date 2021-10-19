<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelsController extends DictController
{
    protected $title = "Уровни";
    protected $dictionary = "level";
    protected $route = "levels";
    protected $model = Level::class;
}
