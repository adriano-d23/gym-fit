<?php

namespace App\Filament\Resources\StudentTrainingResource\Pages;

use App\Filament\Resources\StudentTrainingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentTraining extends EditRecord
{
    protected static string $resource = StudentTrainingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
