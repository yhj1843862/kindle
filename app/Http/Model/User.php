<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'vip';
    protected $primaryKey = 'vip_id';
    public $timestamps = false;

}
