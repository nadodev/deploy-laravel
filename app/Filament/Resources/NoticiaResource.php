<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\NoticiaResource\Pages;
    use App\Filament\Resources\NoticiaResource\RelationManagers;
    use App\Models\Noticia;
    use Filament\Forms\Components\FileUpload;
    use Filament\Forms\Components\RichEditor;
    use Filament\Forms\Components\Section;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Components\ToggleButtons;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Support\Facades\Storage;

    class NoticiaResource extends Resource
    {
        protected static ?string $model = Noticia::class;

        protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function form(Form $form): Form
        {
            return $form
                ->columns(1)
                ->schema([
                    TextInput::make('titulo')
                        ->label('Título'),
                    FileUpload::make('cover')
                        ->label('Foto de Capa')
                        ->image()
                        ->openable()
                        ->downloadable()
                        ->imageEditor()
                        ->directory('images')
                        ->imagePreviewHeight('250')
                        ->loadingIndicatorPosition('left')
                        ->panelAspectRatio('2:1')
                        ->panelLayout('integrated')
                        ->removeUploadedFileButtonPosition('right')
                        ->uploadButtonPosition('left')
                        ->uploadProgressIndicatorPosition('left')
                    ,
                    RichEditor::make('conteudo')
                        ->label('Conteúdo')
                        ->toolbarButtons([
                            'attachFiles',
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ]),
                    Section::make('Status')
                        ->schema([

                            ToggleButtons::make('status')
                                ->options([
                                    'draft' => 'Draft',
                                    'published' => 'Published'
                                ])->inline()->label('')
                                ->default('draft')
                                ->icons([
                                    'draft' => 'heroicon-o-x-circle',
                                    'published' => 'heroicon-o-check-circle'
                                ])
                        ]),

                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('titulo')
                        ->searchable()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('conteudo')
                        ->limit(50)
                        ->html()
                        ->sortable(),
                    Tables\Columns\ImageColumn::make('cover')
                    ->disk('public')
                    ,
                    Tables\Columns\TextColumn::make('status')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'draft' => 'gray',
                            'published' => 'success',
                        })
                        ->searchable()
                        ->sortable(),
                ])
                ->filters([


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
                'index' => Pages\ListNoticias::route('/'),
                'create' => Pages\CreateNoticia::route('/create'),
                'edit' => Pages\EditNoticia::route('/{record}/edit'),
                'delete' => Pages\DeleteNoticia::route('/{record}/delete'),
            ];
        }

        public static function newModel(): Noticia
        {
            return new Noticia();
        }

    }
