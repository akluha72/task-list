<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    //has protection from mass assignment;

    //explicit tell laravel what property can be modified
    protected $fillable = ['title', 'description', 'long_description'];
    // protected $guarded = [''];
}
