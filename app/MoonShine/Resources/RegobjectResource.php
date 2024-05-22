<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\CatRegobject;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regobject;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<Regobject>
 */
class RegobjectResource extends ModelResource
{
    protected string $model = Regobject::class;

    protected string $title = 'Религиозные объекты';

    protected string $column = 'title';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Image::make(__('Изображение'), 'img'),
            Text::make(__('Заголовок'), 'title')

        ];
    }


    public function formFields(): array
    {
        return [
            Block::make([
                Tabs::make([

                    Tab::make(__('Общие настройки'), [
                        Grid::make([
                            Column::make([


                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique(),
                                    Image::make(__('Изображение'), 'img')
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('objects')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable()
                                        ->required()
                                        ->hint('Основное изображение. Обязательное поле.'),

                                ])->show(),


                                Text::make(__('Подзаголовок'), 'subtitle'),

                                TinyMce::make('Краткое описание', 'shortdesc')


                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle'),
                                    Text::make('Мета тэг (description) ', 'description'),
                                    Text::make('Мета тэг (keywords) ', 'keywords'),
                                    Switcher::make('Публикация', 'published')->default(1),

                                ])->show(),
                                Collapse::make('Вложенность', [
                                    BelongsTo::make('Регион', 'area', resource: new AreaResource())->nullable()->searchable(),
                                    BelongsTo::make('Категория', 'catregobject', resource: new CatRegobjectResource())->nullable()->searchable()
                                ])->show(),


                            ])
                                ->columnSpan(6)

                        ]),
                        Divider::make(),
                        Grid::make([
                            Column::make([
                                Image::make(__('Изображение'), 'a_img')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается слева'),

                            ])->columnSpan(6),
                            Column::make([
                                TinyMce::make('Текст', 'a_desc')
                                    ->hint('Встраивается справа, не оптекает'),
                            ])
                                ->columnSpan(6),
                        ]),


                        Divider::make(),

                            TinyMce::make('Описание', 'a_desc2')
                                ->hint('На всю ширину макета'),

                        Image::make(__('Изображение'), 'a_img2')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('objects')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),

                        Divider::make(),
                        Grid::make([
                            Column::make([
                                TinyMce::make('Описание', 'a_desc3')
                                    ->hint('Встраивается слева, не оптекает'),

                            ])->columnSpan(6),
                            Column::make([

                                Image::make(__('Изображение'), 'a_img3')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается справа'),



                            ])
                                ->columnSpan(6),
                        ]),



                        Divider::make(),

                        TinyMce::make('Описание', 'a_desc4')
                            ->hint('На всю ширину макета'),

                        Image::make(__('Изображение'), 'a_img4')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('objects')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),

                    ]),


                    Tab::make(__('Дизайн'), [

                    ]),
                    Tab::make(__('Меню'), [

                    ]),
                ]),


            ]),
        ];


    }

    /**
     * @return //array, добавим кнопок для фильтрации
     */
    public function addQueryTags()
    {
        $categories = CatRegobject::query()->where('published', 1)->get();

        $QueryTag[0] = QueryTag::make(
            __('Все'),
            function (Builder $query) {
                return $query;
            }
        )->icon('heroicons.banknotes');

        foreach ($categories as $category) {
            $QueryTag[] = QueryTag::make(
                $category->title,
                function (Builder $query) use ($category) {
                    return $query->where('cat_regobject_id', $category->id);
                }
            )->icon('heroicons.banknotes');
        }

        return $QueryTag;

    }


    /**
     * @return //кнопки фильтрации
     */
    public function queryTags(): array
    {

        return $this->addQueryTags();
    }

    public function rules(Model $item): array
    {
        return [
            'metatitle' => 'max:1024',
            'description' => 'max:1024',
            'keywords' => 'max:1024',
        ];
    }

    public function getActiveActions(): array
    {
        return ['create', /*'view',*/ 'update', 'delete', 'massDelete'];
    }


    public function import(): ?ImportHandler
    {
        return null;
    }

    public function export(): ?ExportHandler
    {
        return null;
    }
}
