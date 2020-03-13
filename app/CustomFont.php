<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFont extends Model
{
    protected $table = 'custom_fonts';
    protected $fillable = [
        'name',
        'path_location'
    ];
}