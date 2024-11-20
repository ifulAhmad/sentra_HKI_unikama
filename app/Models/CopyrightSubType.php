<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyrightSubType extends Model
{
    use HasFactory, HasUuid;
    protected $guarded = ['uuid'];
    public function copyrightType()
    {
        return $this->belongsTo(CopyrightType::class);
    }
}
