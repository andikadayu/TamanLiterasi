<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MEpisode extends Model
{
    protected $table = "tb_episode";
    protected $primaryKey = 'idi';
    public $timestamps = null;
}
