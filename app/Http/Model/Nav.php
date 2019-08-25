<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    protected $primaryKey = 'nav_id';
    public $timestamps = false;
    protected $guarded = [];
}
