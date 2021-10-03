<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $table = 'resumes';
    protected $guarded = [];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function vacansy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
