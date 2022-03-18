<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'vat', 'street', 'city', 'country', 'postalcode', 'logo', 'capital', 'shares'
    ];

    protected $attributes = [
        'logo' => '/images/avatar/Logo_avatar.png',
        'shares' => 0
    ];

    //
}
