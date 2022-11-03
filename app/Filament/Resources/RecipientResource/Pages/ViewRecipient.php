<?php

namespace App\Filament\Resources\RecipientResource\Pages;

use App\Filament\Resources\RecipientResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRecipient extends ViewRecord
{
    protected static string $resource = RecipientResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
