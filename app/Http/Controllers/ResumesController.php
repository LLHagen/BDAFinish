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
        $resumes =  DB::table('resumes')
            ->join('levels', 'levels.id', '=', 'resumes.level_id')
            ->join('vacancies', 'vacancies.id', '=', 'resumes.vacancy_id')
            ->join('statuses', 'statuses.id', '=', 'resumes.status_id')
            ->select('resumes.*', 'levels.name as level', 'vacancies.name as vacancy', 'statuses.name as status')
            ->get();

        $statuses = Status::get();
        return view('resumes.list', compact('resumes','statuses'));
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
        $resume = Resume::find($id);
        $pdf = PDF::loadView('resumes.pdf',  compact('resume'));
        return $pdf->download('pdf_file.pdf');
    }

    public function store(Request $request)
    {
        $resume = new Resume();
        $attributes = request()->validate([
            'FIO' => 'required',
            'email' => 'required',
            'resume' => 'required',
            'skills' => 'sometimes',
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

        return view('resumes.edit', compact('resume','levels', 'vacancies'));
    }

    public function statusUpdate(Request $request)
    {
        $resume = Resume::find($request->resume);
        $statusId = Status::where('name', $request->status)->first()->id;
        $resume->status_id = $statusId;

        return $resume->save();
    }

    public function interviewUpdate (Request $request)
    {
        $resume = Resume::find($request->resume);
        $resume->interview_date = $request->date;

        return $resume->save();
    }

    public function update(Resume $resume)
    {
        $attributes = request()->validate([
            'FIO' => 'required',
            'email' => 'required',
            'resume' => 'required',
            'skills' => 'sometimes',
            'experience' => 'sometimes',
        ]);
        $attributes['level_id'] = Level::select('id')->where('name', request()->get('level_id'))->first()->id;
        $attributes['vacancy_id'] = Vacancy::select('id')->where('name', request()->get('vacancy_id'))->first()->id;

        $resume->update($attributes);

        return back();
    }
}
