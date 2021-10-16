<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Resume extends Model
{
    use HasFactory;
    use Authenticatable, CanResetPassword, Sortable;
    protected $table = 'resumes';
    protected $guarded = [];
    protected $dates = [
        'interview_date'
    ];
    protected $appends = ['interview_date_formatted'];

    public $sortable = [
        'id',
        'FIO',
        'email',
        'vacancy_id',
        'level_id',
        'status_id',
        'interview_date',
        'created_at',

    ];



    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function getInterviewDateFormattedAttribute(){
        return $this->interview_date ? $this->interview_date->format('Y-m-d\TH:i') : null;
    }
}
