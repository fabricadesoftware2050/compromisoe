<?php

namespace App\Filament\Panel\Resources\SeguidoresResource\Pages;

use App\Filament\Panel\Resources\SeguidoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeguidores extends EditRecord
{
    protected static string $resource = SeguidoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
