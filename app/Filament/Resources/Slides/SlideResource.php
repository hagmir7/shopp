<?php

namespace App\Filament\Resources\Slides;

use App\Filament\Resources\SlideResource\Pages;
use App\Models\Slide;
use BackedEnum;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-square-3-stack-3d';

    public static function getLabel(): string
    {
        return __("Slide");
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __("More options");
    }

    public static function getPluralLabel(): string
    {
        return __("Slides");
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('site_id', app("site")->id)
            ->latest();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(3)
                ->schema([
                    Section::make()
                        ->schema([
                            TextInput::make('title')
                                ->label(__("Title"))
                                ->maxLength(255),
                            TextInput::make('text_button')
                                ->label(__("Text Button"))
                                ->maxLength(255),
                            Textarea::make('description')
                                ->label(__("Description"))
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpan(2),

                    Section::make()
                        ->schema([
                            TextInput::make('url')
                                ->label(__("Slide URL"))
                                ->maxLength(255),
                            FileUpload::make('image')
                                ->label(__("Image"))
                                ->required()
                                ->image(),
                            Toggle::make('status')
                                ->label(__("Status"))
                                ->required(),
                        ])
                        ->columnSpan(1),
                ])->columnSpanFull(),
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
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
