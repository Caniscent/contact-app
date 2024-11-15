<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auth extends Authenticatable
{
    use HasFactory;

    protected $tables = 'auths';
    protected $guarded = ['id'];

    public function contact(){
        return $this->hasOne('Contacts');
    }
}
