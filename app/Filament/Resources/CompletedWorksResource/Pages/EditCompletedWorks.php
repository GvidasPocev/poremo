<?php

namespace App\Filament\Resources\CompletedWorksResource\Pages;

use App\Filament\Resources\CompletedWorksResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompletedWorks extends EditRecord
{
    protected static string $resource = CompletedWorksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
