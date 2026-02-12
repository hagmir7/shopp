<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitTypeResource\Pages;
use App\Filament\Resources\UnitTypeResource\RelationManagers;
use App\Models\UnitType;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitTypeResource extends Resource
{
    protected static ?string $model = UnitType::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-beaker';


    public static function getModelLabel(): string
    {
        return __("Unit");
    }


    public static function getPluralLabel(): ?string
    {
        return __("Units");
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Section::make()
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__("Unit Type"))
                            ->required()
                            ->maxLength(255),
                    ])->columnSpanFull(),

            Forms\Components\Repeater::make('units')
                ->relationship()
                ->label(__("Units"))
                ->grid(3)
                ->columns(2)
                ->columnSpanFull()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->unique(ignoreRecord: true)
                        ->label(__("Unit"))
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('abbreviation')
                        ->unique(ignoreRecord: true)
                        ->label(__("Abbreviation"))
                        ->required()
                        ->maxLength(10),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Unit Type"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('units_count')
                    ->counts('units')
                    ->badge()
                    ->label(__("Units"))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->toolbarActions([
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
            'index' => Pages\ListUnitTypes::route('/'),
            'create' => Pages\CreateUnitType::route('/create'),
            'edit' => Pages\EditUnitType::route('/{record}/edit'),
        ];
    }
}
