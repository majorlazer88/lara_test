<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\View\View;
use Filament\Pages\Actions\Action;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.settings';

    protected static ?string $title = 'Custom Page Title';

    protected static ?string $navigationLabel = 'Custom Navigation Label';

    protected static ?string $slug = 'custom-url-slug';

    // protected static function shouldRegisterNavigation(): bool
    // {
    //     return auth()->user()->canManageSettings();
    // }

    // public function mount(): void
    // {
    //     abort_unless(auth()->user()->canManageSettings(), 403);
    // }

    // protected function getHeader(): View
    // {
    //     return view('filament.settings.custom-header');
    // }

    // protected function getFooter(): View
    // {
    //     return view('filament.settings.custom-footer');
    // }

    public function openSettingsModal(): void
    {
        $this->dispatchBrowserEvent('open-settings-modal');
    }
}
