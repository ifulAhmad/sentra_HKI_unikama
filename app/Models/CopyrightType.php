<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyrightType extends Model
{
    use HasFactory;
    protected $table = 'copyright_types';
    protected $guarded = ['id'];
    public function subTypes()
    {
        return $this->hasMany(CopyrightSubType::class);
    }
}
