<?php

namespace App\Filament\Resources\CategoryResource\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->default(null),
                Select::make('type')
                    ->options(['custom' => 'Custom', 'activity' => 'Activity', 'competition' => 'Competition'])
                    ->default('custom')
                    ->required(),
                TextInput::make('code')
                    ->default(null),
                TextInput::make('slug')
                    ->default(null),
                TextInput::make('icon')
                    ->default(null),
                TextInput::make('description')
                    ->default(null),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
                TextInput::make('parent_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('created_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('deleted_by')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
