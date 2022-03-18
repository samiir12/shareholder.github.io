<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shareholder extends BaseModel
{
    protected $fillable = [
        'firstname', 'lastname', 'email', 'mobile'
    ];

}
