<?php

namespace App\Http\Controllers;

use App\CustomSettings;
use Illuminate\Http\Request;

class CustomSettingsController extends Controller
{
    /**
    * success response method.
    *
    * @return \Illuminate\Http\Response
    */
    public function storeNaturalFontType(Request $request)
    {
        $fontType = $request->get('font_type');
        $fontSafe = $request->get('font_safe');

        CustomSettings::where('alias', 'font_type')->update([
            'value' => $fontType
        ]);

        CustomSettings::where('alias', 'default_selected_font_name')->update([
            'value' => $fontSafe
        ]);

        return response()->json(['success'=>'Successfully Saved And Applied!']);
    }

    /**
    * success response method.
    *
    * @return \Illuminate\Http\Response
    */
    public function storeOldCustomFontType(Request $request)
    {
        $fontType = $request->get('font_type');
        $oldCustomFont = $request->get('old_custom_font');

        CustomSettings::where('alias', 'font_type')->update([
            'value' => $fontType
        ]);

        CustomSettings::where('alias', 'default_uploaded_font_name')->update([
            'value' => $oldCustomFont
        ]);

        return response()->json(['success'=>'Successfully Saved And Applied!']);
    }
}
