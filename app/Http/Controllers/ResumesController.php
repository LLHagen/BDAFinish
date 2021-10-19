<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Resume;
use App\Models\Level;
use App\Models\Status;
use DebugBar\DebugBar;
use App\Models\Vacancy;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResumesController extends Controller
{
    public function index()
    {
        $resumes = Resume::sortable(['created_at' => 'asc'])
                         ->paginate(20);
        $statuses = Status::get();

        return view('resumes.list', compact('resumes', 'statuses'));
    }

    public function show(Resume $resume)
    {
        return view('resumes.show', compact('resume',));
    }

    public function create()
    {
        $levels = Level::orderBy('id')->pluck("name", "id");
        $vacancies = Vacancy::orderBy('id')->pluck("name", "id");
        $statuses = Status::orderBy('id')->pluck("name", "id");

        $resume = new Resume();

        return view('resumes.create', compact('resume', 'levels', 'vacancies', 'statuses'));
    }

    public function createPDF($id)
    {
        $resume = Resume::query()->with('level', 'vacancy', 'status')->find($id);

        \Debugbar::disable();

        // если в ссылке есть ?debug - выведет просто представление
        if (isset($_GET['debug'])) {
            return view('resumes.pdf', compact('resume'));
        }

        return PDF::loadView('resumes.pdf', compact('resume'))
                  ->stream($resume->FIO.'.pdf');
    }

    public function store(Request $request)
    {
        $resume = new Resume();

        $attributes = request()->validate([
                                              'FIO'        => 'required|string|max:255',
                                              'email'      => 'required|string|max:255',
                                              'resume'     => 'required|string|max:8000',
                                              'skills'     => 'sometimes|string|max:2000',
                                              'experience' => 'sometimes|string|max:10000',
                                              'vacancy_id' => 'required|integer|max:10',
                                              'level_id'   => 'required|integer|max:10',
                                          ]);

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
        $levels = Level::orderBy('id')->pluck("name", "id");
        $vacancies = Vacancy::orderBy('id')->pluck("name", "id");
        $statuses = Status::orderBy('id')->pluck("name", "id");
        $resume = Resume::find($id);

        return view('resumes.edit', compact('resume', 'levels', 'vacancies', 'statuses'));
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
        $resume = Resume::find($request->resume);
        $resume->interview_date = Carbon::createFromFormat('d.m.y H:i', $request->date);

        return $resume->save();
    }

    public function update(Resume $resume)
    {
        $attributes = request()->validate([
                                              'FIO'        => 'required|string|max:255',
                                              'email'      => 'required|string|max:255',
                                              'resume'     => 'required|string|max:8000',
                                              'skills'     => 'sometimes|string|max:2000',
                                              'experience' => 'sometimes|string|max:10000',
                                              'vacancy_id' => 'required|integer|max:10',
                                              'level_id'   => 'required|integer|max:10',
                                          ]);

        $resume->update($attributes);

        return redirect()->route('resumes.index');
    }

}
