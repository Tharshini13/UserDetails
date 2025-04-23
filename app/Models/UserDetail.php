<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'userdetails'; // explicitly set table name

    protected $fillable = [
        'name', 'dob', 'gender', 'course',
    ];
}
