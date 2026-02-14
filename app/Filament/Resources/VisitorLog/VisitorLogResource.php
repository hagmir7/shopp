<?php

namespace App\Filament\Resources\VisitorLog;

use App\Filament\Resources\VisitorLogResource\Pages;
use App\Models\VisitorLog;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class VisitorLogResource extends Resource
{
    protected static ?string $model = VisitorLog::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-cursor-arrow-rays';

    public static function getModelLabel(): string
    {
        return __("Visitor Log");
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __("Users and Visitor");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Visitor Logs");
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('url')
                    ->label(__("URL"))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ip_address')
                    ->label(__("IP Address"))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_agent')
                    ->label(__("User Agent"))
                    ->maxLength(255),
                Forms\Components\TextInput::make('referrer')
                    ->label(__("Referrer"))
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('visited_at')
                    ->label(__("Visited At"))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('url')
                    ->label(__("URL"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('ip_address')
                    ->label(__("IP Address"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('visited_at')
                    ->label(__("Visited At"))
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make()
                    ->label(__('Delete Selected'))
            ]);
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
            'index' => Pages\ListVisitorLogs::route('/'),
            'create' => Pages\CreateVisitorLog::route('/create'),
            'edit' => Pages\EditVisitorLog::route('/{record}/edit'),
        ];
    }
}
