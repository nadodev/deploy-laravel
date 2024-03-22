<?php

namespace App\Filament\Resources\NoticiaResource\Pages;

use App\Filament\Resources\NoticiaResource;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditNoticia extends EditRecord
{
    protected static string $resource = NoticiaResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
