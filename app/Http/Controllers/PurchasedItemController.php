<?php

namespace App\Http\Controllers;

use App\Models\PurchasedItem;
use Illuminate\Http\Request;

class PurchasedItemController extends Controller
{
    public function update(Request $request, PurchasedItem $purchasedItem){
        $fields = $request->validate([
            'merchandise_id' => 'integer',
            'purchase_id' => 'integer',
            'wholesale_qty' => 'integer',
            'purchase_price' => 'numeric|min:0',
        ]);

        $purchasedItem->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'purchasedItem with ID#' . $purchasedItem->id . 'has been updated.'
        ]);

    }

    public function store(Request $request, PurchasedItem $purchasedItem){
        $fields = $request->validate([
            'merchandise_id' => 'integer',
            'purchase_id' => 'integer',
            'wholesale_qty' => 'integer',
            'purchase_price' => 'numeric|min:0',
        ]);

        $fields['purchase_price'] = $request->filled('purchase_price') ? $request->input('purchase_price') : null;

        $purchasedItem = $purchasedItem->create($fields);



        return response()->json([
            'status' => 'OK',
            'purchasedItem' => $purchasedItem,
            'message' => 'purchasedItem with ID#' . $purchasedItem->id . 'has been created.'
        ]);

    }

    public function destroy(PurchasedItem $purchasedItem) {
        $details = $purchasedItem-> purchase_price;
        $purchasedItem->delete();

        return response()->json([
            'status' => 'OK',
            'message' => "The purchasedItem  $details has been deleted."
        ]);
    }

    public function index() {
        $purchasedItem = PurchasedItem::orderBy('purchase_id')->get();

        return response()->json($purchasedItem);
    }

    public function view(PurchasedItem $purchasedItem) {

        return response()->json($purchasedItem);
    }
}
