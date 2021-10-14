<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusesController extends Controller
{
    public function index()
    {
        $statuses = $this->get();
        return view('statuses.create', compact('statuses'));
    }

    public function store()
    {
        $status = new Status();
        $attributes = request()->validate([
            'name' => 'required|max:255',
        ]);
        $status->create($attributes);
        return back();
    }

    public function edit($id)
    {
        $status = Status::find($id);
        return view('statuses.edit', compact('status'));
    }

    public function update(Status $status)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
        ]);
        $status->update($attributes);
        return back();
    }

    public function destroy($id)
    {
        Status::destroy($id);
        return back();
    }

    /* --- Для React --- */ //TODO: refactor
    public function get()
    {
        return Status::get();
    }

    public function addByAPI(Request $request){
        $model = new Status();
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
        $model = new Status();
        $model->name = $request->newData['name'];;
        $model->save();
    }
}
