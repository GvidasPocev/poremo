<?php

namespace App\Filament\Resources\CompletedWorksResource\Pages;

use App\Filament\Resources\CompletedWorksResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompletedWorks extends CreateRecord
{
    protected static string $resource = CompletedWorksResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
