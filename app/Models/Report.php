<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'student_id',
        'title',
        'category',
        'description',
        'evidence',
        'is_anonymous',
        'status',
        'admin_notes',  // tambahkan ini
    ];

    // Tambahkan relasi ini
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
