<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'steps';
    protected $fillable = [
        'step_id',
        'row_id',
        'resources',
        'notes',
        'availability'
    ];
}
