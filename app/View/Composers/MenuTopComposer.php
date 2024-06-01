<?php

namespace App\View\Composers;

use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Menu\ViewModels\MenuViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuTopComposer
{
    public function compose(View $view): void
    {

       $menu = Cache::rememberForever('top_menu', function () {
         return MenuViewModel::make()->top_menu(); // Верхнее миеню
         });


        $view->with([
            'menu' => $menu,
        ]);

    }
}
