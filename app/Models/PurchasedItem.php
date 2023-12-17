<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchandise_id',
        'purchase_id',
        'wholesale_qty',
        'purchase_price',

    ];

    public function merchandise()
    {
        return $this->belongsTo(Merchandise::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
