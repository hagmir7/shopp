<?php

namespace App\Filament\Resources\Contact;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-envelope';

    public static function getLabel(): string
    {
        return __("Message");
    }

    public static function getPluralLabel(): string
    {
        return __("Messages");
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::whereNull('read_at')->where('site_id', app("site")->id)->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('site_id', app("site")->id)->latest();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('full_name')
                    ->label(__("Full name"))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label("Email")
                    ->email()
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('subject')
                    ->label(__("Subject"))
                    ->required()
                    ->maxLength(255),

                Forms\Components\DateTimePicker::make('read_at')
                    ->label(__("Read at")),

                Forms\Components\Textarea::make('message')
                    ->rows(10)
                    ->label(__("Message"))
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label(__("Full name"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__("Email"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('subject')
                    ->label(__("Subject"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('read_at')
                    ->label(__("Read at"))
                    ->placeholder('__')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Created"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__("Updated"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                // Uncomment if you want edit action
                // Tables\Actions\EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
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
            'index' => Pages\ListContacts::route('/'),
            // 'create' => Pages\CreateContact::route('/create'), // creation disabled
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
