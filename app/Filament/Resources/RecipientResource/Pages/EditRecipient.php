<?php

namespace App\Filament\Resources\RecipientResource\Pages;

use App\Filament\Resources\RecipientResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecipient extends EditRecord
{
    protected static string $resource = RecipientResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
