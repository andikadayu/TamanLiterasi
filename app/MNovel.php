<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MNovel extends Model
{
    protected $table = 'tb_novel';
    protected $primaryKey = 'id';
    public $timestamps = null;
}
