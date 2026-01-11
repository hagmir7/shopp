<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Site;

class ThemeSwitcher extends Component
{
    public Site $site;

    public $primary;
    public $hover;
    public $text;

    public function mount(Site $site)
    {
        $this->site = $site;

        $theme = $site->theme_color ?? [
            'primary' => '#fbbf24', // amber-400
            'hover' => '#f59e0b',   // amber-500
            'text' => '#111827',    // gray-900
        ];

        $this->primary = $theme['primary'];
        $this->hover = $theme['hover'];
        $this->text = $theme['text'];

        $this->applyTheme();
    }

    public function updated($propertyName)
    {
        $this->applyTheme();
        $this->saveTheme();
    }

    public function applyTheme()
    {
        $js = "
            document.documentElement.style.setProperty('--color-primary', '{$this->primary}');
            document.documentElement.style.setProperty('--color-primary-hover', '{$this->hover}');
            document.documentElement.style.setProperty('--color-primary-text', '{$this->text}');
        ";
        $this->dispatchBrowserEvent('apply-theme', ['js' => $js]);
    }

    public function saveTheme()
    {
        $this->site->update([
            'theme_color' => [
                'primary' => $this->primary,
                'hover' => $this->hover,
                'text' => $this->text,
            ]
        ]);
    }

    public function render()
    {
        return view('livewire.theme-switcher');
    }
}
