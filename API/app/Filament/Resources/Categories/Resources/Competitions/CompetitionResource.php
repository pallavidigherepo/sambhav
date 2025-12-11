<?php

namespace App\Filament\Resources\Categories\Resources\Competitions;

use App\Filament\Resources\Categories\CategoryResource;
use App\Filament\Resources\Categories\Resources\Competitions\Pages\CreateCompetition;
use App\Filament\Resources\Categories\Resources\Competitions\Pages\EditCompetition;
use App\Filament\Resources\Categories\Resources\Competitions\Schemas\CompetitionForm;
use App\Filament\Resources\Categories\Resources\Competitions\Tables\CompetitionsTable;
use App\Models\Competition;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CompetitionResource extends Resource
{
    protected static ?string $model = Competition::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = CategoryResource::class;

    protected static ?string $recordTitleAttribute = 'Competition';

    public static function form(Schema $schema): Schema
    {
        return CompetitionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CompetitionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreateCompetition::route('/create'),
            'edit' => EditCompetition::route('/{record}/edit'),
        ];
    }
}
