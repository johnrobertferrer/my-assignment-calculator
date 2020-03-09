<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Step;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|unique:customers',
        ]);

        $result = Customer::firstOrCreate($data);

        return $result;
    }

    public function fetchCustomerSettings() {
        $steps = Step::all([
            'step_id',
            'row_id',
            'resources',
            'notes',
            'availability'
        ]);

        $reference = [
            'stepIds' => Step::groupBy('step_id')->pluck('step_id')
        ];

        return [
            'steps' => $steps,
            'reference' => $reference
        ];
    }
}
