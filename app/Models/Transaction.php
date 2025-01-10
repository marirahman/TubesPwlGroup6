<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{


    protected $fillable = [
        'product_id',
        'branch_id',
        'user_id',
        'total_amount',
        'date',
    ];

    public function items()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    
    // App\Models\Transaction.php
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Di model Transaction.php
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
