<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /**
     * Kolom yang dapat diisi (mass assignable).
     * Pastikan kolom ini sesuai dengan tabel 'branches'.
     */
    protected $fillable = ['name', 'address', 'supervisor_id'];

    /**
     * Relasi ke model User.
     * Setiap branch memiliki supervisor.
     */
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'branch_id', 'id');
    }
    
    public function stocks()
    {
        return $this->hasMany(Stock::class, 'branch_id', 'id');
    }
    

}
