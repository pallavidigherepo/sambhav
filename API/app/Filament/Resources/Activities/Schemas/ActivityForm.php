<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->options(function () {
                        $categories = \App\Models\Category::with('children')->whereNull('parent_id')->get();
                        $options = [];

                        $formatTree = function ($categories, $prefix = '') use (&$options, &$formatTree) {
                            foreach ($categories as $category) {
                                $options[$category->id] = $prefix . $category->name;
                                if ($category->children->count() > 0) {
                                    $formatTree($category->children, $prefix . '— ');
                                }
                            }
                        };

                        $formatTree($categories);
                        return $options;
                    })
                    ->searchable()
                    ->required(),
                TextInput::make('code')
                    ->required(),
                TextInput::make('location')
                    ->default(null),
                RichEditor::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                DatePicker::make('start_date'),
                DatePicker::make('end_date'),
                TextInput::make('organizer_name')
                    ->default(null),
                TextInput::make('organizer_email')
                    ->email()
                    ->default(null),
                TextInput::make('organizer_phone')
                    ->tel()
                    ->default(null),
                TextInput::make('organizer_website')
                    ->url()
                    ->default(null),
                Select::make('city_id')
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
                TextInput::make('slug')
                    ->default(null),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
