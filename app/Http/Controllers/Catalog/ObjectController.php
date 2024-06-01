<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Catalog\ViewModels\ObjectsViewModel;

class ObjectController extends Controller
{

    /**
     * view
     * страница  объекта
     */

    public function pageObjectHome($religion_slug, $object_slug)
    {


        $item = ObjectsViewModel::make()->objectSlug($object_slug);/** Религиозный объект **/

        if(!$item) {
            // flash()->alert(config('message_flash.alert.page_disable'));
            abort(404);
        }


        $religion =  CatalogViewModel::make()->religionSlug($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  CatalogViewModel::make()->religionList();  /** все религии **/
        $areas = AreaViewModel::make()->areaList(); /** Все субъекты РФ **/
        $selected_area = AreaViewModel::make()->areaId($item->area->id); /** Один субъект РФ **/
        $religion_categories = CatalogViewModel::make()->catRegobjects($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = CatalogViewModel::make()->categoryId($item->catregobject->id); /**  категория определенной религии **/
        $items = ObjectsViewModel::make()->objects($religion, $selected_area, $selected_religion_category);

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
     * страница  объекта
     */

    public function pageObjectContact($religion_slug, $object_slug)
    {


        $item = ObjectsViewModel::make()->objectSlug($object_slug);/** Религиозный объект **/

        if(!$item) {
            // flash()->alert(config('message_flash.alert.page_disable'));
            abort(404);
        }


        $religion =  CatalogViewModel::make()->religionSlug($religion_slug); /** активная религия **/
        if(!$religion) {
            abort(404);
        }

        $religions =  CatalogViewModel::make()->religionList();  /** все религии **/
        $areas = AreaViewModel::make()->areaList(); /** Все субъекты РФ **/
        $selected_area = AreaViewModel::make()->areaId($item->area->id); /** Один субъект РФ **/
        $religion_categories = CatalogViewModel::make()->catRegobjects($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = CatalogViewModel::make()->categoryId($item->catregobject->id); /**  категория определенной религии **/
        $items = ObjectsViewModel::make()->objects($religion, $selected_area, $selected_religion_category);

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
