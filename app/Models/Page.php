<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
protected $table = 'pages';

protected $fillable = [
    'title',
    'slug',
    'subtitle',
    'img',
    'gallery',
    'video',
    'smalltext',
    'text',
    'pageimg1',
    'text2',
    'pageimg2',

    'text3',

    'pageimg3',
    'text4',
    'pageimg4',

    'published',
    'metatitle',
    'description',
    'keywords',
    'sorting',
];
    protected $casts = [
        'params' => 'collection',
        'gallery' => 'collection',
        'video' => 'collection'
    ];






    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            cache_clear();
        });

        static::updated(function () {
            cache_clear();
        });

        static::deleted(function () {
            cache_clear();
        });


    }

}
