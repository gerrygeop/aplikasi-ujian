<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseAnswer extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function question()
    {
        return $this->belongsTo(CourseQuestion::class);
    }
}
