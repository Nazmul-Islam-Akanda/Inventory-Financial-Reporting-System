<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $guarded = [];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
