<?php

namespace App\Filament\Panel\Resources;

use App\Filament\Panel\Resources\SeguidorResource\Pages;
use App\Filament\Panel\Resources\SeguidorResource\RelationManagers;
use App\Models\Seguidor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeguidorResource extends Resource
{
    protected static ?string $model = Seguidor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeguidors::route('/'),
            'create' => Pages\CreateSeguidor::route('/create'),
            'edit' => Pages\EditSeguidor::route('/{record}/edit'),
        ];
    }
}
