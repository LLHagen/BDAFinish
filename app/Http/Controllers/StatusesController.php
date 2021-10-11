<?php

namespace App\Http\Controllers;

use App\Models\Status;
use http\Env\Request;

class StatusesController extends Controller
{
    public function index()
    {
        $statuses = Status::get();
        return view('statuses.create', compact('statuses'));
    }

    public function store()
    {
//        возможно не оптимально
        $status = new Status();
        $status->create(['name'=>request()->get('name')]);
        return back();
    }

    public function edit($id)
    {
        $status = Status::find($id);
        return view('statuses.edit', compact('status'));
    }

    public function update($id)
    {
        $attributes = request()->validate([
            'name' => 'required',
        ]);
        Status::where('id', $id)
            ->update($attributes);
        return back();
    }

    public function destroy($id)
    {
        Status::destroy($id);
        return back();
    }
}
