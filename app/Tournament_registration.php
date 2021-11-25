<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament_registration extends Model
{
    protected $table = 'tournament_registrations';
    /**
     * @var mixed
     */
    private $user_id;
    /**
     * @var mixed
     */
    private $tournament_id;
}
