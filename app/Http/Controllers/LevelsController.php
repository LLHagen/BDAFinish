<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelsController extends Controller
{
    public function index()
    {
        $levels = $this->get();
        return view('levels.create', compact('levels'));
    }

    public function store()
    {
//        возможно не оптимально
        $level = new Level();
        $level->create(['name'=>request()->get('name')]);
        return back();
    }

    public function edit($id)
    {
        $level = Level::find($id);
        return view('levels.edit', compact('level'));
    }

    public function update($id)
    {
        $attributes = request()->validate([
            'name' => 'required',
        ]);
        Level::where('id', $id)
            ->update($attributes);
        return back();
    }

    public function destroy($id)
    {
        Level::destroy($id);
        return back();
    }


    /* --- Для React --- */ //TODO: refactor
    public function get()
    {
        return Level::get();
    }

    public function addByAPI(Request $request){
        $model = new Level();
        $model->name = $request->record['name'];
        $model->save();
    }

    public function delByAPI(Request $request){
        $tableName = $request->tableName;
        $id = $request->recordId['id'];

        DB::table($tableName)->where('id', '=', $id)->delete();
    }

    public function editByAPI(Request $request){
        DB::table($request->tableName)
            ->where('id', '=', $request->recordId)
            ->delete();
        $model = new Level();
        $model->name = $request->newData['name'];;
        $model->save();
    }
}
