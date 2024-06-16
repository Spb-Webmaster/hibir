<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegobjectNew extends Model
{
protected $table = 'regobject_news';
protected $fillable = [
    'title',
    'slug',
    'img',
    'a_desc',
    'a_img',
    'a_desc2',
    'a_img2',
    'a_desc3',
    'a_img3',
    'a_desc4',
    'a_img4',
    'params',
    'published',
    'metatitle',
    'description',
    'keywords',
    'sorting',
];


    protected $casts = [
        'params' => 'collection',
    ];


    public function regobject():BelongsTo
    {
        return $this->belongsTo(Regobject::class);
    }





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
