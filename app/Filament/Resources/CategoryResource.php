<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function getModelLabel(): string
    {
        return __('Category');
    }



    public static function getPluralLabel(): ?string
    {
        return __('Categories');
    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('site_id', app("site")->id)->latest();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__("Category"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('discount')
                                    ->label(__("Discount"))
                                    ->numeric()
                                    ->minValue(0)
                                    ->maxValue(99),
                                Forms\Components\Textarea::make('description')
                                    ->label(__("Description"))
                                    ->columnSpanFull(),
                            ])
                            ->columnSpan(2)
                            ->columns(2),
                        Forms\Components\Section::make()
                            ->schema([

                                Forms\Components\FileUpload::make('image')
                                    ->label(__("Image"))
                                    ->image(),
                            ])->columnSpan(1)
                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__("Image")),
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Category"))
                    ->searchable(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
