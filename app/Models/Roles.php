<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $guarded = [];
    protected $table = 'roles';
    use HasFactory;

    public function users(){

        return $this->hasOne('App\Models\Users', 'role_id');

    }
}
