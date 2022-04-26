<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    protected $guarded = [''];
    protected $table ='discount';
    use HasFactory;

    public function product()
    {
     return $this->belongsTo('App\Models\Products', 'product_id');
    }

    public function category(){

        return $this->hasOne('App\Models\Categories', 'cat_id');

    }
}
