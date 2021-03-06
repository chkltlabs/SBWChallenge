<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['employeeId', 'departmentId', 'name', 'dob'];
    protected $dates = ['dob'];

    function department()
    {
        return $this->hasOne('App/Models/Department', 'departmentId', 'departmentId');
    }
}
