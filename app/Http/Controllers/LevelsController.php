<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Support\Facades\DB;

class LevelsController extends Controller
{
    public function index()
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

    public function getByAPI()
    {
        return DB::table('levels')
            ->select(DB::raw('*'))
            ->get();
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
