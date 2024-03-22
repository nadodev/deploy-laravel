<?php

namespace App\Filament\Resources\NoticiaResource\Pages;

use App\Filament\Resources\NoticiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class DeleteNoticia extends EditRecord
{
    protected static string $resource = NoticiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
