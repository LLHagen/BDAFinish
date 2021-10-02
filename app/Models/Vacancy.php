<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $table = 'vacancies';
    protected $guarded = [];
    public $timestamps = false;

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }
}
