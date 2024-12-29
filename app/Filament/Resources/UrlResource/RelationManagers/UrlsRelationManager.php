<?php

namespace App\Filament\Resources\UrlResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UrlsRelationManager extends RelationManager
{
    protected static string $relationship = 'urls';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__("URL Name"))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('path')
                    ->label(__("Path"))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('parent_id')
                    ->label(__("Parent URL"))
                    ->relationship('parent', 'name')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ])->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->modelLabel(__('URL'))
            ->heading(__('Menu URLs'))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label(__("URL Name")),
                Tables\Columns\TextColumn::make('parent.name')
                    ->placeholder("__")
                    ->searchable()
                    ->label(__("Parent URL")),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->icon('heroicon-o-plus-circle')
                    ->color('success')
                    ->label(__('Create URL')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
