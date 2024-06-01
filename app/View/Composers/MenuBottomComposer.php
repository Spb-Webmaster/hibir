<?php

namespace App\View\Composers;

use Domain\Catalog\ViewModels\AreaViewModel;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Menu\ViewModels\MenuViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuBottomComposer
{
    public function compose(View $view): void
    {

       $menu = Cache::rememberForever('bottom_menu', function () {
         return MenuViewModel::make()->bottom_menu(); // Верхнее миеню
         });

        $view->with([
            'menu' => $menu,
        ]);

    }
}
