<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function update(Request $request, Customer $customer){
        $fields = $request->validate([
            'name' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'balance' => 'numeric|min:0'
        ]);

        $customer->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'customer with ID#' . $customer->id . 'has been update.'
        ]);

    }

    public function store(Request $request, Customer $customer){
        $fields = $request->validate([
            'name' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'balance' => 'numeric|min:0'
        ]);

        $fields['name'] = $request->filled('name') ? $request->input('name') : null;

        $customer = $customer->create($fields);



        return response()->json([
            'status' => 'OK',
            'customer' => $customer,
            'message' => 'customer with ID#' . $customer->id . 'has been created.'
        ]);

    }

    public function destroy(Customer $customer) {
        $details = $customer->name;
        $customer->delete();

        return response()->json([
            'status' => 'OK',
            'message' => "The customer  $details has been deleted."
        ]);
    }

    public function index() {
        $customer = Customer::orderBy('name')->get();

        return response()->json($customer);
    }

    public function view(Customer $customer) {

        $customer->load('sales');

        return response()->json($customer);
    }

}
