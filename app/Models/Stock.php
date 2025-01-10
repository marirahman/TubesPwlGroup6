<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable = ['branch_id', 'product_id', 'quantity'];

  // App\Models\Stock.php
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }


public function product()
    {
        return $this->belongsTo(Product::class);
    }

    
}
