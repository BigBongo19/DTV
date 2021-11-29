<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use SoftDeletes;
    protected $table = 'tournaments';
}
