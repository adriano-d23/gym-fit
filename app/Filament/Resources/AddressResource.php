<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Models\Address;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AddressResource extends Resource
{

    protected static ?string $modelLabel = 'Endereço';
    protected static ?string $pluralModelLabel = 'Endereços';
    protected static ?string $navigationLabel = 'Endereços';
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('street')->required(),
                Forms\Components\TextInput::make('complement'),
                Forms\Components\TextInput::make('zip_code')->required(),
                Forms\Components\TextInput::make('state')->required(),
                Forms\Components\TextInput::make('city')->required(),
                Forms\Components\TextInput::make('neighborhood')->required(),
                Forms\Components\TextInput::make('longitude'),
                Forms\Components\TextInput::make('latitude'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('street')->searchable(),
                Tables\Columns\TextColumn::make('complement')->searchable(),
                Tables\Columns\TextColumn::make('zip_code')->searchable(),
                Tables\Columns\TextColumn::make('state')->searchable(),
                Tables\Columns\TextColumn::make('city')->searchable(),
                Tables\Columns\TextColumn::make('neighborhood')->searchable(),
                Tables\Columns\TextColumn::make('longitude'),
                Tables\Columns\TextColumn::make('latitude'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->filters([
                // Adicione filtros aqui se necessário
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
            // Defina relações se necessário
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}