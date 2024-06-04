<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Catalog\ViewModels\ObjectsViewModel;

class ObjectController extends Controller
{
    /**
     * @return array
     * активная религия
     *
     */

    public function religion($religion_slug){
        return   CatalogViewModel::make()->religionSlug($religion_slug);

    }
    /**
     * @return array
     * Религиозный объект
     */

    public function item($object_slug){
        return ObjectsViewModel::make()->objectSlug($object_slug);

    }

    /**
     * @return array
     * все религии
     */

    public function religions(){
        return CatalogViewModel::make()->religionList();

    }

    /**
     * @return array
     * Все субъекты РФ
     */

    public function areas(){
        return AreaViewModel::make()->areaList();

    }

    /**
     * @return array
     * Один субъект РФ
     */

    public function area($id){
        return AreaViewModel::make()->areaId($id);

    }

    /**
     * @return array
     * спискоk категорий определенной религии
     */

    public function categories($religion_id){
      return CatalogViewModel::make()->catRegobjects($religion_id);

    }

    /**
     * @return array
     * категория определенной религии
     */

    public function category($cat_id){
      return CatalogViewModel::make()->categoryId($cat_id);

    }

    /**
     * @return array
     * список объектов определенной категории и региона
     */

    public function items($religion, $selected_area, $selected_religion_category){
      return ObjectsViewModel::make()->objects($religion, $selected_area, $selected_religion_category);

    }


    /**
     * view
     * страница  объекта
     */

    public function pageObjectHome($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.object',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }


    /**
     * view
     * страница  контактов объекта
     */

    public function pageObjectGallery($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.gallery',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }

    /**
     * view
     * страница  контактов объекта
     */

    public function pageObjectContact($religion_slug, $object_slug)
    {


        $item = $this->item($object_slug); /** Религиозный объект **/

        if(!$item) {
            abort(404);
        }

        $religion =  $this->religion($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  $this->religions();  /** все религии **/
        $areas = $this->areas(); /** Все субъекты РФ **/
        $selected_area = $this->area($item->area->id); /** Один субъект РФ **/
        $religion_categories = $this->categories($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = $this->category($item->catregobject->id); /**  категория определенной религии **/
        $items = $this->items($religion, $selected_area, $selected_religion_category);
        /** список объектов определенной категории и региона */

        return view('pages.catalog.object.contact',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'item' => $item,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }

}
