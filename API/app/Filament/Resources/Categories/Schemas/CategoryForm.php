<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

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
                // The crucial parent relationship field
                Select::make('parent_id')
                            ->label('Parent Category')
                            ->relationship('parent', 'name')
                            ->placeholder('Select a root category or sub-level parent')
                            // Assume better parent exclusion helpers in F4:
                            // ->excludeDescendants(fn ($record) => $record) 
                            ->searchable(['name'])
                            ->preload()
                            ->nullable(),
                    
                // Use a Select field for the Icon/Slug if desired
                TextInput::make('icon')
                    ->label('Font Awesome Icon Class')
                    ->maxLength(255)
                    ->placeholder('e.g., fa-flask'),

                // Automatically generate slug from name
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->disabledOn('edit'), // Slug should be locked after creation
                
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
