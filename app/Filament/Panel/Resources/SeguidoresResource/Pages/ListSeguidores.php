<?php

namespace App\Filament\Panel\Resources\SeguidoresResource\Pages;

use App\Filament\Panel\Resources\SeguidoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeguidores extends ListRecords
{
    protected static string $resource = SeguidoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
