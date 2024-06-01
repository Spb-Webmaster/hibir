<?php
namespace Domain\Menu\ViewModels;

use App\Models\MenuBottomItem;
use App\Models\MenuTopItem;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class MenuViewModel
{
    use Makeable;

    public function top_menu() {
        return MenuTopItem::query()->where('published', 1)->get();
    }

    public function bottom_menu() {
        return MenuBottomItem::query()->where('published', 1)->get();

    }


}
