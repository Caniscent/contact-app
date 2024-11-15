<?php

namespace App\Models;

use App\Models\ContactModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth extends Authenticatable
{
    use HasFactory;

    protected $tables = 'auths';
    protected $guarded = ['id'];

    public function contact(){
        return $this->hasOne(ContactModel::class);
    }
}
