<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MForum extends Model
{
    protected $table = "tb_forum";
    protected $primaryKey = 'idi';
    public $timestamps = null;
}
