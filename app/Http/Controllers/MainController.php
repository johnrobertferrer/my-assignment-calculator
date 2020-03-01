<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome', ['withNav' => true]);
    }

    public function exportPdf()
    {
        $pdf = PDF::loadView('pdf')
            ->setPaper('a4', 'portrait');

        return $pdf->download('my-assigment-calculator.pdf');
    }
}
