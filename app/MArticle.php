<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MArticle extends Model
{
    protected $table = "tb_artikel";
    protected $primaryKey = 'id';
    public $timestamps = null;
}
