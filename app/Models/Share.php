<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = [
        'company_id', 'share_type', 'person_id', 'share'
    ];
}
