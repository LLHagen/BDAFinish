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

    public function getResumeEncodedAttribute()
    {
        return str_replace(
            ["\r\n", "\r", "\n"],
            '<br>',
            htmlspecialchars_decode(addslashes($this->resume)
            )
        );
    }

    public function getInterviewDateFormattedAttribute(){
        return $this->interview_date ? $this->interview_date->format('d-m-Y H:i') : null;
    }
}
