<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\Level;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class ResumesController extends Controller
{
    public function index()
    {
        $resumes = Resume::get();
        return view('resumes.list', compact('resumes'));
    }

    public function show(Resume $resume)
    {
        return view('resumes.show', compact('resume'));
    }

    public function create()
    {
        $levels = Level::get();
        $vacancies = Vacancy::get();
        return view('resumes.create', compact('levels'), compact('vacancies'));
    }

    public function store(Request $request)
    {

//        dd(request()->get('text'), request()->all());
        $resume = new Resume();

//        "FIO" => "rqweq qwqwrqwe qwrqwe"
//        "email" => "igor-smirnov-94@mail.ru"
//        "level_id" => "Мидл"
//        "vacancy_id" => "Верстальщик"
//        "text" => """
//            asfdfh fg
//            yutyujghjg
//        """

        $attributes = request()->validate([
            'FIO' => 'required',
            'email' => 'required',
            'text' => 'required',
        ]);

//        $attributes['level_id'] = Level::select('id')->where('name', request()->get('level_id'))->first()->id;
//        $attributes['vacancy_id'] = Vacancy::select('id')->where('name', request()->get('vacancy_id'))->first()->id;

        $resume->create($attributes);

        return back();
    }

    public function destroy($id)
    {
        return Resume::where('id', $id)->delete();
    }

    public function edit($id)
    {
        $resume = Resume::find($id);
        return view('resumes.edit', compact('resume'));
    }

    public function update(Resume $resume)
    {
        $attributes = request()->validate([
            'FIO' => 'required',
        ]);
        $resume->update($attributes);
        return back();
    }
}
