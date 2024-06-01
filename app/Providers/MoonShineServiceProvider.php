<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\MenuTopItem;
use App\MoonShine\Resources\AreaResource;
use App\MoonShine\Resources\CatRegobjectResource;
use App\MoonShine\Resources\InfoResource;
use App\MoonShine\Resources\ItemRegobjectResource;
use App\MoonShine\Resources\MenuBottomResource;
use App\MoonShine\Resources\MenuTopResource;
use App\MoonShine\Resources\RegobjectResource;
use App\MoonShine\Resources\ReligionResource;
use App\MoonShine\Resources\SeoResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [

            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ]),


            MenuGroup::make(static fn() => __('Страницы сайта'), [

                MenuItem::make(
                    static fn() => __('Новости'),
                    new InfoResource()
                )->icon('heroicons.newspaper'),


            ]),


            MenuGroup::make(static fn() => __('Категории объектов'), [

               MenuItem::make(
                    static fn() => __('Категории'),
                    new CatRegobjectResource()
                )->icon('heroicons.bars-3'),

                MenuItem::make(
                    static fn() => __('Объекты'),
                    new RegobjectResource()
                )->icon('heroicons.bars-arrow-up')

            ]),


            MenuGroup::make(static fn() => __('Страницы объектов'), [

               MenuItem::make(
                    static fn() => __('Страницы'),
                    new ItemRegobjectResource()
                )->icon('heroicons.outline.flag'),


            ]),



            MenuGroup::make(static fn() => __('Служебная информация'), [


                MenuItem::make(
                    static fn() => __('Субъекты РФ'),
                    new AreaResource()
                )->icon('heroicons.outline.building-library'),
                MenuItem::make(
                    static fn() => __('Религии'),
                    new ReligionResource()
                )->icon('heroicons.outline.rectangle-group'),

            ]),

            MenuGroup::make(static fn() => __('Настройки'), [


                MenuItem::make(
                    static fn() => __('SEO'),
                    new SeoResource()
                )->icon('heroicons.outline.bug-ant'),

            ]),
            MenuGroup::make(static fn() => __('Меню'), [


                MenuItem::make(
                    static fn() => __('Верхнее меню'),
                    new MenuTopResource()
                )->icon('heroicons.bars-3'),

                MenuItem::make(
                    static fn() => __('Нижнее меню'),
                    new MenuBottomResource()
                )->icon('heroicons.bars-3'),

            ]),
        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
