<?php

namespace App\Filament\Resources\Sites;

use App\Filament\Resources\Sites\Pages;
use App\Filament\Resources\Sites\Schemas\SiteForm;
use App\Filament\Resources\UrlResource\RelationManagers\UrlsRelationManager;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use App\Models\Site;
use BackedEnum;

class SiteResource extends Resource
{
    protected static ?string $model = Site::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-storefront';

    public static function getNavigationSort(): ?int
    {
        return 0;
    }

    public static function getModelLabel(): string
    {
        return __("Store");
    }


    public static function getPluralLabel(): ?string
    {
        return __("Stores");
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()
            ->where('user_id', auth()->id());
    }

    public static function form(Schema $schema): Schema
    {
        return SiteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')->label(__("Logo")),
                TextColumn::make('name')->label(__("Store"))->searchable(),
                TextColumn::make('domain')->label(__("Domain"))->searchable(),
                TextColumn::make('language.name')->label(__("Language"))->sortable(),
                TextColumn::make('country.name')->label(__("Country"))->sortable(),
                TextColumn::make('currency')->label(__("Currency"))->badge()->searchable(),
                TextColumn::make('created_at')->label(__("Created"))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->label(__("Updated"))->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                ReplicateAction::make()
                    ->beforeReplicaSaved(function (array $data): array {
                        do {
                            $domain = Str::random(10) . '.com';
                            $exists = DB::table('sites')->where('domain', $domain)->exists();
                        } while ($exists);

                        $data['domain'] = $domain;
                        return $data;
                    }),
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
            UrlsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSites::route('/'),
            'create' => Pages\CreateSite::route('/create'),
            'edit' => Pages\EditSite::route('/{record}/edit'),
        ];
    }
}
