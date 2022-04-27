<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $guarded = [];
    protected $table = 'users';
    use HasFactory;

    public function role()
    {
       return $this->belongsTo('App\Models\Roles', 'role_id');
    }

    public function logs()
    {
       return $this->hasOne('App\Models\Logs', 'user_id');
    }
}
