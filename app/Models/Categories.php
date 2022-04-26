<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $guareded = [];
    protected $table = 'category';
    use HasFactory;

    public function product() {

        return $this->hasOne('App\Models\Products', 'cat_id');

    }

    public function cat() {

        return $this->hasOne('App\Models\Discount', 'cat_id');

    }
}
