<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'is_admin']; // Добавляем is_admin
    protected $hidden = ['password', 'remember_token'];
}