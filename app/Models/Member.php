<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'password',
        'phone_number',
        'birthdate',
        'email',
        'gender',
        'ktp_number',
        'photo'
    ];
}