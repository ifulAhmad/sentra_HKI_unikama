<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimApplicantData extends Model
{
    use HasFactory, HasUuid;
    protected $guarded = ['uuid'];
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
