<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
//    protected $table = 'user';
    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';


}
