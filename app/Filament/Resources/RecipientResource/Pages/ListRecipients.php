<?php

namespace App\Filament\Resources\RecipientResource\Pages;

use App\Filament\Resources\RecipientResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecipients extends ListRecords
{
    protected static string $resource = RecipientResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
