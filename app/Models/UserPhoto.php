<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    protected $table = 'user_photos';
    protected $fillable = [
        'title',
        'img',
        'like',
        'user_id',
        'sorting'
    ];


}
