<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\MoonShine\Pages\CategoryTreePage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Religion;

use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<Religion>
 */

class ReligionResource extends TreeResource
{
    protected string $model = Religion::class;

    protected string $title = 'Религии';

    protected string $column = 'title';

    protected string $sortColumn = 'sorting';


    protected ?ClickAction $clickAction = ClickAction::EDIT;

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),

            Text::make(__('Заголовок'), 'title')

        ];
    }
    public function formFields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make(__('Заголовок'), 'title')
                    ->required(),
                Slug::make(__('Алиас'), 'slug')
                    ->from('title')
                    ->unique(),
            ]),
        ];
    }


    public function rules(Model $item): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [
            CategoryTreePage::make($this->title()),
            FormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            DetailPage::make(__('moonshine::ui.show')),
        ];
    }



    public function import(): ?ImportHandler
    {
        return null;
    }

    public function getActiveActions(): array
    {
        return [/*'create', 'view', 'update', 'delete', 'massDelete'*/];
    }


    public function export(): ?ExportHandler
    {
        return null;
    }

    public function treeKey(): ?string
    {
        return null;
    }

    public function sortKey(): string
    {
        return 'sorting';
    }
}
