<?php

namespace App\Filament\Resources\NoticiaResource\Pages;

use App\Filament\Resources\NoticiaResource;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\ToggleButtons;


class CreateNoticia extends CreateRecord
{
    protected static string $resource = NoticiaResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static ?string $title = 'Cadastrar Notícia';



//    public function create(bool $another = false): void
//    {
//        $data = $this->form->getState();
//        $this->record = NoticiaResource::newModel()->create([
//            'titulo' => $data['titulo'],
//            'conteudo' => $data['conteudo'],
//            'cover' => $data['cover'][0] ?? null,
//        ]);
//
//    }


}
