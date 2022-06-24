<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    //
    protected $fillable = [
        'title', 'is_done', 'category_id'
    ];
}
