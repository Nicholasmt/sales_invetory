<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function product()
    {
     return $this->belongsTo('App\Models\Products', 'product_id');
    }

    public function customer(){

        return $this->belongsTo('App\Models\Customer', 'customer_id');

    }

}
