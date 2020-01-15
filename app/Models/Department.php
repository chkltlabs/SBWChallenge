<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['departmentId', 'departmentName'];


    function employees()
    {
        return $this->hasMany('App/Models/Employee', 'departmentId', 'departmentId');
    }
}
