<?php

namespace App\Filament\Panel\Resources\SeguidorResource\Pages;

use App\Filament\Panel\Resources\SeguidorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeguidor extends EditRecord
{
    protected static string $resource = SeguidorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
