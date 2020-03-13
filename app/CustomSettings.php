<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomSettings extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_settings';
    protected $fillable = [
        'name',
        'alias',
        'value',
        'availability'
    ];
}
