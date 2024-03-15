<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateSkills extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'skill', 'passing_year'];
}
