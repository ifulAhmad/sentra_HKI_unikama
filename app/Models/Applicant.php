<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submissions()
    {
        return $this->belongsToMany(Submission::class, 'submission_applicant', 'applicant_id', 'submission_uuid')->withTimestamps();
    }
}
