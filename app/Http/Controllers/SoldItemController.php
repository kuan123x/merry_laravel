<?php

namespace App\Http\Controllers;

use App\Models\SoldItem;
use Illuminate\Http\Request;

class SoldItemController extends Controller
{
    public function update(Request $request, SoldItem $soldItem){
        $fields = $request->validate([
            'merchandise_id' => 'integer',
            'sale_id' => 'integer',
            'qty' => 'integer',
            'selling_price' => 'numeric|min:0',
        ]);

        $soldItem->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'soldItem with ID#' . $soldItem->id . 'has been updated.'
        ]);

    }

    public function store(Request $request, SoldItem $soldItem){
        $fields = $request->validate([
            'merchandise_id' => 'integer',
            'sale_id' => 'integer',
            'qty' => 'integer',
            'selling_price' => 'numeric|min:0',
        ]);

        $fields['selling_price'] = $request->filled('selling_price') ? $request->input('selling_price') : null;

        $soldItem = $soldItem->create($fields);



        return response()->json([
            'status' => 'OK',
            'soldItem' => $soldItem,
            'message' => 'soldItem with ID#' . $soldItem->id . 'has been created.'
        ]);

    }

    public function destroy(SoldItem $soldItem) {
        $details = $soldItem-> selling_price;
        $soldItem->delete();

        return response()->json([
            'status' => 'OK',
            'message' => "The soldItem  $details has been deleted."
        ]);
    }

    public function index() {
        $soldItem = SoldItem::orderBy('selling_price')->get();

        return response()->json($soldItem);
    }

    public function view(SoldItem $soldItem) {

        return response()->json($soldItem);
    }

}
