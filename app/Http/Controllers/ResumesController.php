<?php

namespace App\Http\Controllers;

use App\Models\Resume;
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
        return view('resumes.create');
    }

    public function store(Request $request)
    {
        dd($request);
        $resume = new Resume();
        $attributes = request()->validate([
            'FIO' => 'required',
        ]);
        return $resume->create($attributes);

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
    public function update(Resume $resume){
        $attributes = request()->validate([
            'FIO' => 'required',
        ]);

        $resume->update($attributes);
        return back();
    }
}
