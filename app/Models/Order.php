<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
}
