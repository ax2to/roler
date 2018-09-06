<?php

namespace App\Models\DnD35;

use Illuminate\Database\Eloquent\Model;

class BaseClass extends Model
{
    const CORE_CLERIC = 3;
    protected $table = 'dnd35_classes';
}
