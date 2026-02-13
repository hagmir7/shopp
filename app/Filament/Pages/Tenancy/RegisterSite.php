<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Site;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class RegisterSite extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Store';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->unique(Site::class, 'slug')
                    ->default(fn($get) => Str::slug($get('name'))),
            ]);
    }

    protected function handleRegistration(array $data): Site
    {
        $site = Site::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'owner_id' => auth()->id(),
        ]);

        $site->users()->attach(auth()->user());

        return $site;
    }
}
