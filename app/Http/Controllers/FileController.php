<?php

namespace App\Http\Controllers;

use App\CustomFont;
use App\CustomSettings;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
    * success response method.
    *
    * @return \Illuminate\Http\Response
    */
    public function formSubmit(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'name'  => 'required|unique:custom_fonts,name'
        ]);

        $extension = $request->file->getClientOriginalExtension();

        Logger($extension);
        if(!($extension == 'ttf' || $extension == 'otf' || $extension == 'eol' || $extension == 'woff' || $extension == 'woff2')) {
            abort(404);
        }

        $fileName = 'custom_font_' . time();
        $fileNameExtension = $fileName . '.'. $extension;
        $request->file->move(public_path('upload'), $fileNameExtension);
        $customFontName = $request->get('custom_font_name');

        $customFontName = $request->get('name');

        CustomFont::create([
            'name' => $customFontName,
            'path_location' => 'upload/' . $fileName
        ]);

        CustomSettings::where('alias', 'font_type')->update([
            'value' => 1
        ]);

        CustomSettings::where('alias', 'default_uploaded_font_name')->update([
            'value' => 'upload/' . $fileName
        ]);

        return response()->json(['success'=>'You have successfully upload file.']);
    }

    public function messages()
    {
        return [
            'file.required' => 'File is required.',
            'name.required'  => 'Name is required.',
            'name.unique' => 'Custom Font Name is already used. Please, choose another custom name.'
        ];
    }
}
