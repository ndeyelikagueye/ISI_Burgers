<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'burger_id',
        'quantity',
        'price',
    ];




    public function burger()
    {
        return $this->belongsTo(Burgers::class);
    }

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
