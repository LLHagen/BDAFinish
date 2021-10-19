<?php

namespace App\Http\Controllers;

class DictController extends Controller
{
    protected $title = "Справочник";
    protected $route = "dictionaries";
    protected $dictionary = "dictionary";

    public function index()
    {
        $data = $this->getDictData();

        return view('dict.view', $data);
    }

    protected function getDictData()
    {
        return [
            "items"      => $this->get(),
            "dict"       => $this->dictionary,
            "dict_route" => $this->route,
            "dict_title" => $this->title,
        ];
    }

    public function edit($id)
    {
        $model = $this->model;
        $item = $model::find($id);

        $params = [
            "dict"       => $this->dictionary,
            "dict_route" => $this->route,
            "dict_title" => $this->title,
        ];

        return view('dict.edit', compact('item') + $params);
    }

    public function store()
    {
        $model = $this->model;
        $item = new $model();
        $attributes = request()->validate(['name' => 'required|max:255']);

        $item->create($attributes);

        return back();
    }

    public function update($id)
    {
        $model = $this->model;
        $item = $model::findOrFail($id);
        $attributes = request()->validate(['name' => 'required|max:255',]);
        $item->update($attributes);

        return redirect()->route($this->route.".index");
    }

    public function destroy($id)
    {
        $model = $this->model;
        $model::destroy($id);

        return 'OK';
    }


    /* --- Для React --- */ //TODO: refactor
    public function get()
    {
        $model = $this->model;

        return $model::query()->orderBy('id')->get();
    }
}
