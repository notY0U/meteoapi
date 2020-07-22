<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $hidden = ['id', 'created_at', 'updated_at', 'tag'

    ];
}
