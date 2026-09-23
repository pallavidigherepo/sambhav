<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            // Our custom View Live Action
            Action::make('view_live')
                ->label('View Live')
                ->color('info')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->url(fn ($record): string => env('FRONTEND_URL')."/blog/{$record->slug}")
                ->openUrlInNewTab(),
        ];
    }
}
