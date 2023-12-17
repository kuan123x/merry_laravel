<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function update(Request $request, Purchase $purchase){
        $fields = $request->validate([
            'date' => 'date',
            'supplier_id' => 'integer',
            'total' => 'numeric|max:999999.99',
            'user_id' => 'integer',
            'invoice_no' => 'string'

        ]);

        $purchase->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'purchase with ID#' . $purchase->id . 'has been updated.'
        ]);

    }

    public function store(Request $request, Purchase $purchase){
        $fields = $request->validate([
            'date' => 'date',
            'supplier_id' => 'integer',
            'total' => 'numeric|max:999999.99',
            'user_id' => 'integer',
            'invoice_no' => 'string',
        ]);

        $fields['user_id'] = $request->filled('user_id') ? $request->input('user_id') : null;

        $purchase = $purchase->create($fields);



        return response()->json([
            'status' => 'OK',
            'purchase' => $purchase,
            'message' => 'purchase with ID#' . $purchase->id . 'has been created.'
        ]);

    }

    public function destroy(Purchase $purchase) {
        $details = $purchase-> total;
        $purchase->delete();

        return response()->json([
            'status' => 'OK',
            'message' => "The purchase  $details has been deleted."
        ]);
    }

    public function index() {
        $purchase = Purchase::orderBy('user_id')->get();

        return response()->json($purchase);
    }

    public function view(Purchase $purchase) {

        return response()->json($purchase);
    }
}
