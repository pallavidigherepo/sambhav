<?php

namespace App\Filament\Resources\Categories\Tables;

use App\Filament\Resources\Activities\ActivityResource;
use App\Filament\Resources\Competitions\CompetitionResource;
use App\Models\Category;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('type')
                    ->badge(),
                TextColumn::make('parent.name')
                    ->searchable(),
                TextColumn::make('activities_count')->counts('activities'),
                TextColumn::make('competitions_count')->counts('competitions'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                // Link to Activities filtered by this Category
                Action::make('view_activities')
                    ->label('Activities')
                    ->icon('heroicon-o-sparkles')
                    ->color('info')
                    ->url(fn (Category $record): string => 
                        ActivityResource::getUrl('index', [
                            'tableFilters[category_id][value]' => $record->id
                        ])
                    ),
                // Link to Competitions filtered by this Category
                Action::make('view_competitions')
                    ->label('Competitions')
                    ->icon('heroicon-o-trophy')
                    ->color('success')
                    ->url(fn (Category $record): string => 
                        CompetitionResource::getUrl('index', [
                            'tableFilters[category_id][value]' => $record->id
                        ])
                    ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
