<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomFont;
use App\Step;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::all();

        return view('home', compact('customers'));
    }

    /**
     * Fetch the admin settings.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function fetch()
    {
        $steps = Step::all([
            'step_id',
            'row_id',
            'resources',
            'notes',
            'availability'
        ]);

        $oldCustomFonts = CustomFont::all([
            'name',
            'path_location'
        ]);

        return [
            'steps' => $steps,
            'oldCustomFonts' => $oldCustomFonts
        ];
    }

    /**
     * Updates the admin settings.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $request->validate([
            'steps' => 'required',
            'customSettings'  => 'required'
        ]);

        $steps = $request->get('steps');

        foreach($steps as $step) {
            Step::where('step_id', $step['step_id'])
                ->where('row_id', $step['row_id'])
                ->update([
                'resources' => $step['resources'],
                'notes' => $step['notes'],
                'availability' => $step['availability']
                ]);
        }

        return "Successfully Saved And Applied!";
    }
}
