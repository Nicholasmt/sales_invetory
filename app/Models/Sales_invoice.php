<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_invoice extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'sales_invoice';

    public function product()
    {
      return $this->belongsTo('App\Models\Products', 'product_id');

    }

    public function category()
    {
      return $this->belongsTo('App\Models\Categories', 'cat_id');

    }

    public function discount()
    {
      return $this->belongsTo('App\Models\Discounts', 'discount_id');

    }

    public function user()
    {
      return $this->belongsTo('App\Models\Users', 'user_id');

    }
    public function customer()
    {
      return $this->belongsTo('App\Models\Customer', 'customer_id');

    }
    
    
    
    

}
