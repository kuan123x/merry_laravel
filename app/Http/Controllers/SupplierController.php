<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function update(Request $request, Supplier $supplier){
        $fields = $request->validate([
            'company_name' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'contact_person' => 'string',

        ]);

        $supplier->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'supplier with ID#' . $supplier->id . 'has been updated.'
        ]);

    }

    public function store(Request $request, Supplier $supplier){
        $fields = $request->validate([
            'company_name' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'contact_person' => 'string',
        ]);

        $fields['phone'] = $request->filled('phone') ? $request->input('phone') : null;

        $supplier = $supplier->create($fields);



        return response()->json([
            'status' => 'OK',
            'supplier' => $supplier,
            'message' => 'supplier with ID#' . $supplier->id . 'has been created.'
        ]);

    }

    public function destroy(Supplier $supplier) {
        $details = $supplier->company_name;
        $supplier->delete();

        return response()->json([
            'status' => 'OK',
            'message' => "The supplier  $details has been deleted."
        ]);
    }

    public function index() {
        $supplier = Supplier::orderBy('company_name')->get();

        return response()->json($supplier);
    }

    public function view(Supplier $supplier) {

        return response()->json($supplier);
    }
}
