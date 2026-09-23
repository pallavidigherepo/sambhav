<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->live() // Essential for the URL preview to update in real-time
                    ->helperText(function ($state) {
                        if (!$state) return 'Enter a title to generate the URL.';
                        
                        // This dynamically shows the user the final frontend URL
                        return "Your post will be live at: ".env('APP_URL')."/blog/{$state}";
                    })
                    // ->suffixAction(
                    //     Action::make('copyUrl')
                    //         ->icon('heroicon-m-clipboard')
                    //         ->action(function ($state, $livewire) {
                    //             $url = env('APP_URL'). "/blog/" . $state;
                    //             // Dispatches a browser event to copy to clipboard
                    //             $livewire->dispatch('copy-to-clipboard', text: $url);
                    //         })
                    // )
                    ->readOnly(true),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('thumbnail')->image()->directory('blog'),
                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}
