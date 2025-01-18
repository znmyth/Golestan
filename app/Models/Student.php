<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'name'];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function objections()
    {
        return $this->hasMany(Objection::class);
    }
}