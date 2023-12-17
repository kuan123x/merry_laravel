<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'description',
        'retail_price',
        'wholesale_price',
        'wholesale_qty',
        'qty_stock',

    ];

    public function purchasedItems()
    {
        return $this->hasMany(PurchasedItem::class);
    }

    public function soldItems()
    {
        return $this->hasMany(SoldItem::class);
    }

    public $timestamps = false;
}
