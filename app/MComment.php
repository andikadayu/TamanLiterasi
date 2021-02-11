<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MComment extends Model
{
    protected $table = "tb_komentar";
    protected $primaryKey = 'id';
    public $timestamps = null;
}
