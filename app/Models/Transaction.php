<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{


    protected $fillable = [
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
    

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
