<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use http\Env\Request;

class VacanciesController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::get();
        return view('vacancies.create', compact('vacancies'));
    }

    public function store()
    {
//        возможно не оптимально
        $vacancies = new Vacancy();
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $vacancies->create($attributes);
        return back();
    }

    public function edit($id)
    {
        $vacancy = Vacancy::find($id);
        return view('vacancies.edit', compact('vacancy'));
    }

    public function update($id)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $attributes['isActive'] = (bool) request()->input('isActive', false);
        Vacancy::where('id', $id)
            ->update($attributes);
        return back();
    }

    public function destroy($id)
    {
        Vacancy::destroy($id);
        return back();
    }
}
