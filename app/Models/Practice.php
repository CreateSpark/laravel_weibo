<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    protected $table = 'practice';

    protected $fillable = ['name','age','sex'];
}
