<?php

namespace App\Filament\Resources\CompletedWorksResource\Pages;

use App\Filament\Resources\CompletedWorksResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompletedWorks extends ListRecords
{
    protected static string $resource = CompletedWorksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
