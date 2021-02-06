<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUser extends Model
{
    protected $table = "user";
    protected $primaryKey = 'id';
    public $timestamps = null;
}
