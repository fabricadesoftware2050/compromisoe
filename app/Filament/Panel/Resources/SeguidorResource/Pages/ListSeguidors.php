<?php

namespace App\Filament\Panel\Resources\SeguidorResource\Pages;

use App\Filament\Panel\Resources\SeguidorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeguidors extends ListRecords
{
    protected static string $resource = SeguidorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
