<?php

use App\Step;
use Illuminate\Database\Seeder;

class add_default_steps extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $steps = 7;
        $rows = 3;

        for ($i=0; $i<$steps; $i++) {
            for ($j=0; $j<$rows; $j++) {
                Step::create([
                    'step_id' => $i+1,
                    'row_id' => $j+1,
                    'resources' => '',
                    'notes' => '',
                    'availability' => true
                ]);
            }
        }
    }
}
