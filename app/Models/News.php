<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class News extends Model
{
    use HasFactory, HasUuid;
    protected $table = 'news';
    protected $guarded = ['uuid'];
}
