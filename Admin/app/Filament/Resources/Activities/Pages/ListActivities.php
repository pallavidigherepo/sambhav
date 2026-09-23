<?php

namespace App\Filament\Resources\Activities\Pages;

use App\Filament\Resources\Activities\ActivityResource;
use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActivities extends ListRecords
{
    protected static string $resource = ActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('back_to_categories')
                ->label('Back to Categories')
                ->color('gray')
                ->icon('heroicon-m-arrow-left')
                // Only show this button if we arrived here via a Category link
                ->visible(fn () => request()->has('tableFilters.category.value'))
                ->url(CategoryResource::getUrl('index')),
        ];
    }
}
