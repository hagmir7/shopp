<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Site;
use Filament\Notifications\Notification;

class ThemeSettings extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-fire';
    protected static string $view = 'filament.pages.theme-settings';
    protected static ?string $title = 'Theme Settings';
    protected static ?string $navigationLabel = 'Theme Settings';
    protected static ?string $navigationGroup = 'Settings';

    public function mount(): void
    {
        $site = app('site');

        // Decode JSON string to array
        $themeColor = $site->theme_color;

        if (is_string($themeColor)) {
            $theme = json_decode($themeColor, true) ?? [
                'primary' => '#fbbf24',
                'hover' => '#f59e0b',
                'text' => '#111827',
            ];
        } else {
            $theme = $themeColor ?? [
                'primary' => '#fbbf24',
                'hover' => '#f59e0b',
                'text' => '#111827',
            ];
        }

        $this->form->fill($theme);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\ColorPicker::make('primary')
                    ->label('Primary Color')
                    ->required(),
                Forms\Components\ColorPicker::make('hover')
                    ->label('Hover Color')
                    ->required(),
                Forms\Components\ColorPicker::make('text')
                    ->label('Text Color')
                    ->required(),
            ])
            ->statePath('data');
    }

    public function save()
    {
        $data = $this->form->getState();

        $site = app('site');

        // Store as JSON string
        $site->update([
            'theme_color' => json_encode($data),
        ]);

        Notification::make()
            ->success()
            ->title('Theme updated successfully')
            ->send();

        $this->dispatch('theme-updated', $data);
    }
}
