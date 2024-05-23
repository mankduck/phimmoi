<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCatalogue extends Model
{
    use HasFactory;

    protected $table = 'nhom_users';

    protected $guarded = [];
}