<?php
namespace Domain\Catalog\ViewModels;

use App\Models\CatRegobject;
use App\Models\Regobject;
use App\Models\Religion;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class ObjectsViewModel
{
    use Makeable;

    public function objects($religion = null, $area = null, $religion_category = null)
    {
       $query = Regobject::query();
       if($religion) {
           $query->where('religion_id', $religion->id);
       }
       if($area) {
           $query->where('area_id', $area->id);
       }
       if($religion_category) {
           $query->where('cat_regobject_id', $religion_category->id);
       }
       $query->where('published', 1);
       $query->orderBy('created_at', 'desc');
       $result = $query->paginate(20);
        return $result;

    }

    public function objectSlug($slug)
    {
        return Regobject::query()
            ->where('published', 1)
            ->where('slug', $slug)
            ->first();

    }
    public function objectId($id)
    {
        return Regobject::query()
            ->where('published', 1)
            ->where('id', $id)
            ->first();

    }


}
