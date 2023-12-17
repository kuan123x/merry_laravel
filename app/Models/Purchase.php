<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'supplier_id',
        'total' => 'numeric|max:999999.99',
        'user_id',
        'invoice_no'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purchasedItems()
    {
        return $this->hasMany(PurchasedItem::class);
    }
}
