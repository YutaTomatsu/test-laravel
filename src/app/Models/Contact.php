<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
            'id',
            'gender',
            'email',
            'address',
            'post',
            'build',
            'content',
            'fullname',
            'start_date',
            'end_date',
            
            
        ];


  
}