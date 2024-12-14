<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, HasUuid;
    protected $guarded = ['uuid'];
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_uuid', 'uuid');
    }
}
