<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{

    protected $guarded = [];
    protected $table = 'sales_sellers_log';
    use HasFactory;

    public function user()
    {
   return $this->belongsTo('App\Models\Users', 'user_id');
    }
}
