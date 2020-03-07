<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';
    protected $fillable = [
        'firstname',
        'lastname',
        'email'
    ];
}
