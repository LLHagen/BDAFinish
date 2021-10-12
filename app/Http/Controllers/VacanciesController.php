<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Resume;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacanciesController extends Controller
{
    public function index()
    {
        $vacancies = $this->get();
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

    /* --- Для React --- */ //TODO: refactor
    public function get()
    {
        return Vacancy::get();
    }

    public function delByAPI(Request $request){
        $tableName = $request->tableName;
        $id = $request->recordId['id'];

        DB::table($tableName)->where('id', '=', $id)->delete();
    }

    public function addByAPI(Request $request){
        $model = new Vacancy();
        foreach($request->record as $key => $value){
            if($key == '__KEY__')
                continue;
            else
                $model->$key = $value;
        }
        $model->save();
    }

    public function editByAPI(Request $request){
        $key = array_keys($request->newData)[0];
        DB::table('vacancies')
            ->where('id', $request->recordId)
            ->update([$key=> $request->newData[$key]]);
    }
}
