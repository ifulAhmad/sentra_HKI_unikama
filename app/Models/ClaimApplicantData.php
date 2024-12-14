<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimApplicantData extends Model
{
    use HasFactory, HasUuid;
    protected $guarded = ['uuid'];
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
