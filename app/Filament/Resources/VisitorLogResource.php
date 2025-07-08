<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorLogResource\Pages;
use App\Filament\Resources\VisitorLogResource\RelationManagers;
use App\Models\VisitorLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VisitorLogResource extends Resource
{
    protected static ?string $model = VisitorLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-rays';


    public static function getModelLabel(): string
    {
        return __("Visitor Log");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Visitor Logs");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
