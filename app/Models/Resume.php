<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';
    public $timestamps = false; // Для чего мы его вообще оставили?
    protected $guarded = [];
    protected $dates = [
        'interview_date'
    ];
    protected $appends = ['interview_date_formatted'];

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
