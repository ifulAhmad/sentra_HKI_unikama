<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
    use HasFactory, Notifiable;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submissions()
    {
        return $this->belongsToMany(Submission::class, 'submission_applicant', 'applicant_id', 'submission_uuid')->withTimestamps();
    }

    public function orderOfCreators()
    {
        return $this->hasMany(OrderOfCreator::class);
    }

    public function claim()
    {
        return $this->hasOne(ClaimApplicantData::class);
    }
}
