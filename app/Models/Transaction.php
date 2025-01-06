<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
    
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
