<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideResource\Pages;
use App\Filament\Resources\SlideResource\RelationManagers;
use App\Models\Slide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';


    public static function getModelLabel(): string
    {
        return __("Slide");
    }


    public static function getPluralLabel(): ?string
    {
        return __("Slides");
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
                                Forms\Components\TextInput::make('title')
                                    ->label(__("Title"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('text_button')
                                    ->label(__("Text Button"))
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->label(__("Description"))
                                    ->required()
                                    ->columnSpanFull(),
                            ])->columns(2)
                            ->columnSpan(2),
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('url')
                                    ->label(__("Slide URL"))
                                    ->maxLength(255),
                                Forms\Components\FileUpload::make('image')
                                    ->label(__("Image"))
                                    ->image(),
                                Forms\Components\Toggle::make('status')
                                    ->label(__("Status"))
                                    ->required(),
                            ])->columnSpan(1),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__("Image")),
                Tables\Columns\TextColumn::make('title')
                    ->label(__("Title"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('site.name')
                    ->label(__("Site"))
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
            'index' => Pages\ListSlides::route('/'),
            'create' => Pages\CreateSlide::route('/create'),
            'edit' => Pages\EditSlide::route('/{record}/edit'),
        ];
    }
}
