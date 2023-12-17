<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function update(Request $request, Sale $sale){
        $fields = $request->validate([
            'customer_id' => 'integer',
            'date' => 'date',
            'is_credit' => 'numeric|min:0',
            'user_id' => 'integer',

        ]);

        $sale->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'sale with ID#' . $sale->id . 'has been updated.'
        ]);

    }

    public function store(Request $request, Sale $sale){
        $fields = $request->validate([
            'customer_id' => 'integer',
            'date' => 'date',
            'is_credit' => 'numeric|min:0',
            'user_id' => 'integer',
        ]);

        $fields['customer_id'] = $request->filled('customer_id') ? $request->input('customer_id') : null;

        $sale = $sale->create($fields);



        return response()->json([
            'status' => 'OK',
            'sale' => $sale,
            'message' => 'sale with ID#' . $sale->id . 'has been created.'
        ]);

    }

    public function destroy(Sale $sale) {
        $details = $sale->is_credit;
        $sale->delete();

        return response()->json([
            'status' => 'OK',
            'message' => "The sale  $details has been deleted."
        ]);
    }

    public function index() {
        $sale = Sale::orderBy('user_id')->get();

        return response()->json($sale);
    }

    public function view(Sale $sale) {

        return response()->json($sale);
    }
}
