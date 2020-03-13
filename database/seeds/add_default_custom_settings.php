<?php

use Illuminate\Database\Seeder;
use App\CustomSettings;

class add_default_custom_settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         CustomSettings::create([
            'name' => 'Font Type',
            'alias' => 'font_type',
            'value' => 1
         ]);

         CustomSettings::create([
            'name' => 'Default Uploaded Font Name',
            'alias' => 'default_uploaded_font_name'
         ]);

         CustomSettings::create([
            'name' => 'Default Selected Font Name',
            'alias' => 'default_selected_font_name'
         ]);
     }
}
