<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionFiles extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_uuid', 'uuid');
    }
}
