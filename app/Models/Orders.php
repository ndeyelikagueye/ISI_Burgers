<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'payment_date',
    ];

    public function user()
    {
        return $this->belongsTo(Utilisateurs::class);
    }




    public function orderItem()
    {
        return $this->hasMany(Order_Items::class);
    }

    public function burger()
    {
        return $this->belongsToMany(Burgers::class, 'order_items');
    }
}
