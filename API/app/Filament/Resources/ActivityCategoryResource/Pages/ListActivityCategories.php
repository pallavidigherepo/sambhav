<?php

namespace App\Filament\Resources\ActivityCategoryResource\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\ActivityCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActivityCategories extends ListRecords
{
    protected static string $resource = ActivityCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
