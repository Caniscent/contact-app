<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth;

class ContactModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'contacts';
    protected $guarded = ['id'];

    public function credentials(){
        return $this->hasOne(Auth::class);
    }
}
