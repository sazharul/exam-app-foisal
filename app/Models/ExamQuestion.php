<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model {
    use HasFactory;
    protected $guarded = [];

    public function questionOptions() {
        return $this->hasMany(ExamQuestionOption::class);
    }
}
