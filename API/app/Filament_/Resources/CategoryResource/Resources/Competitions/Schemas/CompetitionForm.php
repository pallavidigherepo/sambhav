<?php

namespace App\Filament\Resources\CategoryResource\Resources\Competitions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CompetitionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('code')
                    ->required(),
                TextInput::make('description')
                    ->default(null),
                DatePicker::make('start_date'),
                DatePicker::make('end_date'),
                TextInput::make('location')
                    ->default(null),
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
                TextInput::make('contact_info')
                    ->default(null),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('video')
                    ->default(null),
                Textarea::make('rules')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('prize')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('terms_and_conditions')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('registration_fee')
                    ->default(null),
                DatePicker::make('registration_deadline'),
                Textarea::make('eligibility_criteria')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('judging_criteria')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('sponsorship_info')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('social_media_links')
                    ->default(null),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
                TextInput::make('city_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('event_id')
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
                TextInput::make('slug')
                    ->default(null),
            ]);
    }
}
