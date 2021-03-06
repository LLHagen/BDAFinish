<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = 'levels';
    protected $guarded = [];
    public $timestamps = false;

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }
}
