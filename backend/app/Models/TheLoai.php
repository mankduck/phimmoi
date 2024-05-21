<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;

    protected $table = 'the_loai';
    
    protected $guarded = [];
    
    // protected $fillable = [
    //     'ten_the_loai',
    //     'trang_thai',
    //     'mo_ta',
    // ];
}