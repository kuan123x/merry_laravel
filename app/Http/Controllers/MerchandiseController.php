<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function update(Request $request, Merchandise $merchandise){
        $fields = $request->validate([
            'brand' => 'string',
            'description' => 'string',
            'retail_price' => 'numeric|min:0',
            'wholesale_price' => 'numeric|min:0',
            'wholesale_qty' => 'integer',
            'qty_stock' => 'integer',
        ]);

        $merchandise->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Merchandise with ID#' . $merchandise->id . 'has been updated.'
        ]);

    }

    public function store(Request $request, Merchandise $merchandise){
        $fields = $request->validate([
            'brand' => 'string',
            'description' => 'string',
            'retail_price' => 'numeric|min:0',
            'wholesale_price' => 'numeric|min:0',
            'wholesale_qty' => 'integer',
            'qty_stock' => 'integer',
        ]);

        $fields['brand'] = $request->filled('brand') ? $request->input('brand') : null;

        $merchandise = $merchandise->create($fields);



        return response()->json([
            'status' => 'OK',
            'MERCHAN$merchandise' => $merchandise,
            'message' => 'Merchandise with ID#' . $merchandise->id . ' has been created.'
        ]);

    }

    public function destroy(Merchandise $merchandise) {
        $details = $merchandise->brand;
        $merchandise->delete();

        return response()->json([
            'status' => 'OK',
            'message' => "The $details has been deleted."
        ]);
    }

    public function index() {
        $merchandise = Merchandise::orderBy('brand')->get();

        return response()->json($merchandise);
    }

    public function view(Merchandise $merchandise) {

        return response()->json($merchandise);
    }

}
