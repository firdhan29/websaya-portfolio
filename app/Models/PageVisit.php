<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['ip_address', 'user_agent'])]
class PageVisit extends Model
{
    //
}
