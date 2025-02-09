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

    public function orderOfCreators()
    {
        return $this->hasMany(OrderOfCreator::class);
    }

    public function subtype()
    {
        return $this->belongsTo(CopyrightSubType::class, 'copyright_sub_type_uuid', 'uuid');
    }

    public function files()
    {
        return $this->hasOne(SubmissionFiles::class, 'submission_uuid', 'uuid');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'submission_uuid', 'uuid');
    }
    public function certificate()
    {
        return $this->hasOne(Certificate::class, 'submission_uuid', 'uuid');
    }
}
