<?php

namespace App\Filament\Resources\CategoryResource\Resources\Competitions\Pages;

use App\Filament\Resources\CategoryResource\Resources\Competitions\CompetitionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCompetition extends CreateRecord
{
    protected static string $resource = CompetitionResource::class;
}
