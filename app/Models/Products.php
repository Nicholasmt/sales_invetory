<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $guareded = [];
    protected $table = 'products';
    use HasFactory;

    public function category(){

        return $this->belongsTo('App\Models\Categories', 'cat_id');

    }
    
    public function discount(){

        return $this->hasOne('App\Models\Products', 'product_id');

    }
}
