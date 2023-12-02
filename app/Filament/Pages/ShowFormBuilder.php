<?php

namespace App\Filament\Pages;

use App\Models\FormTemplate;
use Filament\Pages\Page;
use InteractsWithRecord;

class ShowFormBuilder extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.show-form-builder';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
