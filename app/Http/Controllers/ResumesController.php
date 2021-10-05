<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\Level;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResumesController extends Controller
{
    public function index()
    {
        $resumes = Resume::get();//
        return view('resumes.list', compact('resumes'));
    }
    public function test()
    {

        $resumes = DB::table('resumes')
            ->join('levels', 'levels.id', '=', 'resumes.level_id')
            ->select('resumes.*', 'levels.name')
            ->get();


//        $table->increments('id');
//        $table->string('FIO');
//        $table->string('email');
//        $table->text('text');
//        $table->date('interview_date')->nullable();
//        $table->unsignedInteger('level_id')->nullable();
//        $table->unsignedInteger('status_id')->default(1);
//        $table->timestamps();



//        $resumes = Resume::join('contacts', 'users.id', '=', 'contacts.user_id')->get();
        return view('resumes.test', compact('resumes'));
    }

    public function getByAPI()
    {
        return DB::table('resumes')
            ->select(DB::raw('*'))
            ->join('levels', 'levels.id', '=', 'resumes.level_id')
            ->join('statuses', 'statuses.id', '=', 'resumes.status_id')
            ->join('vacancies', 'vacancies.id', '=', 'resumes.vacancy_id')
            ->get();
    }

    public function show(Resume $resume)
    {
        return view('resumes.show', compact('resume'));
    }

    public function create()
    {
        $levels = Level::get();
        $vacancies = Vacancy::get();
        return view('resumes.create', compact('levels'), compact('vacancies'));
    }

    public function store(Request $request)
    {

//        dd(request()->get('text'), request()->all());
        $resume = new Resume();

        $attributes = request()->validate([
            'FIO' => 'required',
            'email' => 'required',
            'text' => 'required',
        ]);

        $attributes['level_id'] = Level::select('id')->where('name', request()->get('level_id'))->first()->id;
//        $attributes['vacancy_id'] = Vacancy::select('id')->where('name', request()->get('vacancy_id'))->first()->id;

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
        $resume = Resume::find($id);
        return view('resumes.edit', compact('resume'));
    }

    public function update(Resume $resume)
    {
        $attributes = request()->validate([
            'FIO' => 'required',
        ]);
        $resume->update($attributes);
        return back();
    }

// костыльный сидер сделать адекватно
    public function seeder()
    {

        DB::table('statuses')->insert([
            ['name' => 'Ожидает'],
            ['name' => 'Рассмотрен'],
            ['name' => 'Одобрен'],
        ]);
        DB::table('vacancies')->insert([
            [
                'name' => 'PHP Разработчик',
                'description' => 'PHP Разработчик description'
            ],
            [
                'name' => 'Тестировщик',
                'description' => 'Тестировщик description'
            ],
            [
                'name' => 'Верстальщик',
                'description' => 'Верстальщик description'
            ],
        ]);

        DB::table('resumes')->insert([
            [
                'FIO' => 'Иванов Иван Иванович',
                'email' => 'igot-smirnov-94@mail.ru',
                'text' => 'Резюме текст',
                'status_id' => 1,
                'level_id' => 1,
            ],
            [
                'FIO' => 'Петров Петр Петрович',
                'email' => 'igot-smirnov-94@mail.ru',
                'text' => 'Резюме текст',
                'status_id' => 2,
                'level_id' => 1,
            ],
        ]);

    }
}
