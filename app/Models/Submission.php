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
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    public function applicants()
    {
        return $this->belongsToMany(Applicant::class, 'submission_applicant', 'submission_uuid', 'applicant_id')->withTimestamps();
    }
}
