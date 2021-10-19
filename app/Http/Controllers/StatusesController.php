<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Resume;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusesController extends DictController
{
    protected $title = "Статусы";
    protected $dictionary = "status";
    protected $route = "statuses";
    protected $model = Status::class;
}
