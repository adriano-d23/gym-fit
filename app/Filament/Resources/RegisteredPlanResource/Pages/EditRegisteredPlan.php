<?php

namespace App\Filament\Resources\RegisteredPlanResource\Pages;

use App\Filament\Resources\RegisteredPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegisteredPlan extends EditRecord
{
    protected static string $resource = RegisteredPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
