<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'student_id',
        'title',
        'category',
        'is_anonymous',
        'description',
        'evidence',
        'status',
    ];
}
