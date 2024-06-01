<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Regobject extends Model
{
    protected $table = 'regobjects';
    protected $fillable = [
        'title',
        'slug',
        'img',
        'subtitle',
        'shortdesc',
        'main_title',
        'main_desc',
        'main_right_img',
        'main_right_img_text',
        'contact_title',
        'contact_address',
        'contact_phone1',
        'contact_phone2',
        'contact_email',
        'contact_desc',
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

    public function religion():BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }

    public function area():BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function catregobject():BelongsTo
    {
        return $this->belongsTo(CatRegobject::class, 'cat_regobject_id');

    }

    protected static function boot()
    {
        parent::boot();


        # Проверка данных пользователя перед сохранением
        static::saving(function ($Moonshine) {
            $cat_regobject_id = $Moonshine->cat_regobject_id;
            $cat_regobject = CatRegobject::query()->where('id', $cat_regobject_id)->first();
            $religion = Religion::query()->where('id', $cat_regobject->religion_id)->first();


            $Moonshine->religion_id = $religion->id;

            $cat_area_id = $Moonshine->area_id;
            $area = Area::query()->where('id', $cat_area_id)->first();

            if(!$Moonshine->keywords) {
                $keywords = $religion->title . ' | '. $Moonshine->title;
                if($Moonshine->subtitle) {
                    $keywords .= ' | ' .$Moonshine->subtitle;
                }
                $keywords .= ' | '. $area->title;
                $Moonshine->keywords = $keywords;
            }
            if(!$Moonshine->metatitle) {
                $metatitle = $Moonshine->title.', '. $area->title;
                $Moonshine->metatitle = $metatitle;
            }
            if(!$Moonshine->description) {
                $description = 'Местоположение - '. $area->title .', религия  - '. $religion->title.', категория - '. $cat_regobject->title .' , название - '. $Moonshine->title;
                $Moonshine->description = $description;
            }
        });


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
