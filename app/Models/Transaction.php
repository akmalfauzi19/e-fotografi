<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'product_id', 'user_id', 'uuid', 'name', 'email', 'address', 'date', 'number',
        'transaction_price', 'transaction_status'
    ];

    protected $hidden = [
        //jika ingin tidak ditampilkan
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
