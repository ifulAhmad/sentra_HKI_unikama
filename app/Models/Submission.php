<?php

namespace App\Models;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasUuid;

class Submission extends Model
{
    use HasFactory, HasUuid;
    protected $guarded = ['uuid'];
    public function applicants()
    {
        return $this->belongsToMany(Applicant::class, 'submission_applicant')->withTimestamps();
    }
}
