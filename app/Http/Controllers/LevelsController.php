<?php

namespace App\Http\Controllers;

use App\Models\Level;
use http\Env\Request;

class LevelsController extends Controller
{
    public function create()
    {
        $levels = Level::get();
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
}
