<?php

namespace App\Http\Controllers;

use App\CustomSettings;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // $customSettings = CustomSettings::get();

        return view('welcome', [
            'withNav' => true, 
            'fontType' => CustomSettings::where('alias', 'font_type')->first()->value,
            'fontSafe' => CustomSettings::where('alias', 'default_selected_font_name')->first()->value,
            'customFontName' => CustomSettings::where('alias', 'default_uploaded_font_name')->first()->value
        ]);
    }

    public function exportPdf()
    {
        $pdf = PDF::loadView('pdf')
            ->setPaper('a4', 'portrait');

        return $pdf->download('my-assigment-calculator.pdf');
    }
}
