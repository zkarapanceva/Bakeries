<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bakery extends Model
{
    protected $fillable = ['name', 'addr_city', 'addr_street'];
}
