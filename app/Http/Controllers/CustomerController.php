<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'firstname' => 'required|unique:customers',
            'lastname'  => 'required|unique:customers',
            'email'     => 'required|unique:customers',
        ]);

        $result = Customer::firstOrCreate($data);

        // $result = Customer::create([
        //     'firstname' => $request->data['firstname'],
        //     'lastname' => $request->data['lastname'],
        //     'email' => $request->data['email']
        // ]);

        return $result;
    }
}
