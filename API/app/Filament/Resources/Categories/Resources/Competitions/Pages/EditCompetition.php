<?php

namespace App\Filament\Resources\Categories\Resources\Competitions\Pages;

use App\Filament\Resources\Categories\Resources\Competitions\CompetitionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCompetition extends EditRecord
{
    protected static string $resource = CompetitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
