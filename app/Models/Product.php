<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Daftar atribut yang bisa diisi secara massal (mass assignable)
    protected $fillable = [
        'name', 'code', 'price_buy', 'price_sell', 'stock',
    ];

    /**
     * Relasi ke model Branch (Cabang).
     * Produk dimiliki oleh satu cabang.
     */
    public function branch()
{
    return $this->belongsTo(Branch::class, 'name');
} 
    /**
     * Relasi ke model Transaction.
     * Produk bisa muncul di banyak transaksi.
     */
    public function transactions()
    {
        return $this->belongsToMany(Transaction::class)
                    ->withPivot('quantity', 'total_price')
                    ->withTimestamps();
    }

    public function stoks()
{
    return $this->hasOne(Stock::class);
}

}
