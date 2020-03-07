<?php

namespace App\Http\Controllers;

use App\Customer;
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
}
