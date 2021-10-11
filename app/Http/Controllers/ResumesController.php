<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\Level;
use App\Models\Status;
use App\Models\Vacancy;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResumesController extends Controller
{
    public function index()
    {
        $resumes = DB::table('resumes')
                     ->join('levels', 'levels.id', '=', 'resumes.level_id')
                     ->join('vacancies', 'vacancies.id', '=', 'resumes.vacancy_id')
                     ->join('statuses', 'statuses.id', '=', 'resumes.status_id')
                     ->select('resumes.*', 'levels.name as level', 'vacancies.name as vacancy', 'statuses.name as status')
                     ->get();

        $statuses = Status::get();

        return view('resumes.list', compact('resumes', 'statuses'));
    }

    public function getByAPI()
    {
        return DB::table('resumes')
            ->select(DB::raw('*'))
            ->join('levels', 'levels.id', '=', 'resumes.level_id')
            ->join('statuses', 'statuses.id', '=', 'resumes.status_id')
            ->join('vacancies', 'vacancies.id', '=', 'resumes.vacancy_id')
            ->get();
    }

    public function show(Resume $resume)
    {
        return view('resumes.show', compact('resume',));
    }

    public function create()
    {
        $levels = Level::get();
        $vacancies = Vacancy::get();

        return view('resumes.create', compact('levels'), compact('vacancies'));
    }

    public function createPDF($id)
    {
        $resume = Resume::query()->with('level', 'vacancy', 'status')->find($id);

        //return view('resumes.pdf', compact('resume'));

        return PDF::loadView('resumes.pdf', compact('resume'))
                  ->stream($resume->FIO.'.pdf');
    }

    public function store(Request $request)
    {
        $resume = new Resume();
        $attributes = request()->validate([
                                              'FIO'        => 'required',
                                              'email'      => 'required',
                                              'resume'     => 'required',
                                              'skills'     => 'sometimes',
                                              'experience' => 'sometimes',
                                          ]);
        $attributes['level_id'] = Level::select('id')->where('name', request()->get('level_id'))->first()->id;
        $attributes['vacancy_id'] = Vacancy::select('id')->where('name', request()->get('vacancy_id'))->first()->id;

        $resume->create($attributes);

        return back();
    }

    public function destroy($id)
    {
        Resume::destroy($id);

        return back();
    }

    public function edit($id)
    {
        $levels = Level::get();
        $vacancies = Vacancy::get();
        $resume = Resume::find($id);

        return view('resumes.edit', compact('resume', 'levels', 'vacancies'));
    }

    public function statusUpdate(Request $request)
    {
        $resume = Resume::find($request->resume);
        $statusId = Status::where('name', $request->status)->first()->id;
        $resume->status_id = $statusId;

        return $resume->save();
    }

    public function interviewUpdate(Request $request)
    {
<<<<<<< HEAD
        $resume = Resume::find($request->resume);
        $resume->interview_date = $request->date;

        return $resume->save();
    }
=======

        DB::table('statuses')->insert([
            ['name' => 'Ожидает'],
            ['name' => 'Рассмотрен'],
            ['name' => 'Одобрен'],
        ]);
        DB::table('vacancies')->insert([
            [
                'name' => 'PHP Разработчик',
                'description' => 'PHP Разработчик description'
            ],
            [
                'name' => 'Тестировщик',
                'description' => 'Тестировщик description'
            ],
            [
                'name' => 'Верстальщик',
                'description' => 'Верстальщик description'
            ],
        ]);

        DB::table('resumes')->insert([
            [
                'FIO' => 'Иванов Иван Иванович',
                'email' => 'igot-smirnov-94@mail.ru',
                'text' => 'Резюме текст',
                'status_id' => 1,
                'level_id' => 1,
            ],
            [
                'FIO' => 'Петров Петр Петрович',
                'email' => 'igot-smirnov-94@mail.ru',
                'text' => 'Резюме текст',
                'status_id' => 2,
                'level_id' => 1,
            ],
        ]);
>>>>>>> 1fa2044db874a0690dd237c80cd9f3e95772f17d

    public function update(Resume $resume)
    {
        $attributes = request()->validate([
                                              'FIO'        => 'required',
                                              'email'      => 'required',
                                              'resume'     => 'required',
                                              'skills'     => 'sometimes',
                                              'experience' => 'sometimes',
                                          ]);
        $attributes['level_id'] = Level::select('id')->where('name', request()->get('level_id'))->first()->id;
        $attributes['vacancy_id'] = Vacancy::select('id')->where('name', request()->get('vacancy_id'))->first()->id;

        $resume->update($attributes);

        return back();
    }
}
