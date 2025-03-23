<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentTrainingResource\Pages;
use App\Filament\Resources\StudentTrainingResource\RelationManagers;
use App\Models\StudentTraining;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentTrainingResource extends Resource
{
    protected static ?string $model = StudentTraining::class;

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
            'index' => Pages\ListStudentTrainings::route('/'),
            'create' => Pages\CreateStudentTraining::route('/create'),
            'edit' => Pages\EditStudentTraining::route('/{record}/edit'),
        ];
    }
}
