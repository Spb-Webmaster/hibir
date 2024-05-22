<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\CatRegobject;
use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Catalog\ViewModels\ObjectsViewModel;
use Domain\Info\ViewModels\InfoViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatalogController extends Controller
{

    /**
     * view
     * страница религии
     */
    public function religion($slug)
    {

        $religion =  CatalogViewModel::make()->religionSlug($slug); // активная религия
        $religions =  CatalogViewModel::make()->religionList(); // все религии

       return view('pages.catalog.religion.religion',
           [
               'religion' => $religion,
               'religions' => $religions
           ]);
    }


    /**
     * view
     * страница религии из select
     */
    public function religionSubmit(Request $request)
    {

        $religion =  CatalogViewModel::make()->religionId($request->religion); // активная религия
        return redirect(route('religion', ['slug' => $religion->slug]));

    }



    /**
     * view
     * страница региона из select
     */
    public function areaSubmit(Request $request)
    {
        $religion =  CatalogViewModel::make()->religionId($request->religion); //  религия

        return redirect(route('religion.area.list', ['slug' => $religion->slug, 'id' => $request->area]));


    }



    /**
     * view
     * страница категории религии из select
     */
    public function religion_categorySubmit(Request $request)
    {
        /**
         * получаем религию, регион, и категорию религии
         */
        $religion_category =  CatalogViewModel::make()->categoryId($request->religion_category); /** активная категория религии **/
        if($religion_category->religion) {
            $religion_slug = $religion_category->religion->slug;
            $religion_category_slug  =  $religion_category->slug;
        }


          return redirect(route('religion.area.category.list', ['religion_slug' => $religion_slug, 'area_id' => $request->area, 'religion_gategory_slug' => $religion_category_slug]));

    }



    /** -   --------------------------------------------------   -  **/


    /**
     * view
     * страница списка объектов и религий
     */

    public function religionAreaListObjects($slug, $id)
    {

        $religion =  CatalogViewModel::make()->religionSlug($slug); /** активная религия **/
        $religions =  CatalogViewModel::make()->religionList();  /** все религии **/
        $areas = AreaViewModel::make()->areaList(); /** Все субъекты РФ **/
        $selected_area = AreaViewModel::make()->areaId($id); /** Один субъект РФ **/
        $religion_categories = CatalogViewModel::make()->catRegobject($religion->id); /** спискоk категорий определенной религии **/
        $items = ObjectsViewModel::make()->objects($religion, $selected_area);

        return view('pages.catalog.list_objects.religion_area_list_objects',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'religion_categories' => $religion_categories,
            ]);
    }

    /**
     * view
     * страница списка объектов и религий и категории религии
     */

    public function religionAreaListCategoryObjects($religion_slug, $area_id, $religion_gategory_slug)
    {

        $slug =  $religion_slug;
        $id = $area_id;

        $religion =  CatalogViewModel::make()->religionSlug($slug); /** активная религия **/
        $religions =  CatalogViewModel::make()->religionList();  /** все религии **/
        $areas = AreaViewModel::make()->areaList(); /** Все субъекты РФ **/
        $selected_area = AreaViewModel::make()->areaId($id); /** Один субъект РФ **/
        $religion_categories = CatalogViewModel::make()->catRegobjects($religion->id); /** спискоk категорий определенной религии **/
        $selected_religion_category = CatalogViewModel::make()->categorySlug($religion_gategory_slug); /**  категорий определенной религии **/
        $items = ObjectsViewModel::make()->objects($religion, $selected_area, $selected_religion_category);

        return view('pages.catalog.list_objects.religion_area_category_list_objects',
            [
                'religion' => $religion,
                'religions' => $religions,
                'areas' => $areas,
                'selected_area' => $selected_area,
                'items' => $items,
                'religion_categories' => $religion_categories,
                'selected_religion_category' => $selected_religion_category,
            ]);
    }






}