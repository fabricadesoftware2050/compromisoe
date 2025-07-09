<?php

namespace App\Filament\Panel\Resources;

use App\Filament\Panel\Resources\SeguidoresResource\Pages;
use App\Filament\Panel\Resources\SeguidoresResource\RelationManagers;
use App\Models\Seguidor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeguidoresResource extends Resource
{
    protected static ?string $model = Seguidor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    /**
     *
     * @param \Filament\Forms\Form $form
     * @return Forms\Form
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('documento')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('lider')
                    ->label('Líder')
                    ->default(false),
                Forms\Components\TextInput::make('celular')
                    ->nullable()
                    ->maxLength(20),
                Forms\Components\TextInput::make('correo')
                    ->nullable()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('direccion')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('municipio')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('puesto')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mesa')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('foto')
                    ->nullable()
                    ->image()
                    ->maxSize(1024) // 1MB
                    ->directory('seguidores_fotos')
                    ->preserveFilenames()
                    ->visibility('public')
                    ->label('Foto del Seguidor'),

                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('documento')
                    ->label('Documento')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('lider')
                    ->label('Líder')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\TextColumn::make('celular')
                    ->label('Celular')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('correo')
                    ->label('Correo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->label('Dirección')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('municipio')
                    ->label('Municipio')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('puesto')
                    ->label('Puesto')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mesa')
                    ->label('Mesa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->size(50)
                    ->circular()
                    ->default('https://via.placeholder.com/50'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\Filter::make('lider')
                    ->label('Líderes')
                    ->query(fn (Builder $query) => $query->where('lider', true))                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSeguidores::route('/'),
            'create' => Pages\CreateSeguidores::route('/create'),
            'edit' => Pages\EditSeguidores::route('/{record}/edit'),
        ];
    }
}
