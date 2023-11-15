<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Navigation;
use App\Models\Page;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Paslaugos';

    protected static ?string $pluralModelLabel = 'Paslaugos';

    protected static ?string $navigationGroup = 'Turinys';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    Grid::make(3)->columnSpan(1)->schema([
                        Forms\Components\TextInput::make('slug')
                            ->label('Nuoroda')
                            ->required()
                            ->columnSpan('full')
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->prefix(route('services') . '/'),

                        Forms\Components\TextInput::make('title')
                            ->label('Pavadinimas')
                            ->required()
                            ->columnSpan('full'),

                        Forms\Components\Textarea::make('short_description')
                            ->label('Trumpas aprašymas')
                            ->required()
                            ->rows(2)
                            ->columnSpan('full'),

                        Forms\Components\RichEditor::make('description')
                            ->label('Aprašymas')
                            ->required()
                            ->columnSpan('full')
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'undo',
                            ]),
                    ]),

                    Grid::make(2)->columnSpan(1)->schema([
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Nuotrauka')
                            ->acceptedFileTypes(['image/png, image/jpeg', 'image/jpg'])
                            ->image()
                            ->maxSize(4096)
                            ->imageCropAspectRatio('73:49')
                            ->imageResizeTargetWidth('365')
                            ->imageResizeTargetHeight('245')
                            ->directory('services')
                            ->columnSpan('full'),

                        Forms\Components\FileUpload::make('inner_main_image')
                            ->label('Vidinė pagrindinė nuotrauka')
                            ->acceptedFileTypes(['image/png, image/jpeg', 'image/jpg'])
                            ->image()
                            ->maxSize(4096)
                            ->imageCropAspectRatio('20:23')
                            ->directory('services')
                            ->columnSpan('full'),

                        Forms\Components\FileUpload::make('inner_image')
                            ->label('Nuotraukų galerija')
                            ->acceptedFileTypes(['image/png, image/jpeg', 'image/jpg'])
                            ->image()
                            ->multiple()
                            ->maxSize(4096)
                            ->imageResizeTargetWidth('540')
                            ->directory('services')
                            ->columnSpan('full'),

                        Forms\Components\Checkbox::make('show_in_index')
                            ->label('Tituliniame')
                            ->default(0),
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Pavadinimas')
                    ->searchable(),

                Tables\Columns\TextColumn::make('short_description')
                    ->label('Trumpas aprašymas')
                    ->limit(30)
                    ->searchable(),

                Tables\Columns\IconColumn::make('show_in_index')
                    ->boolean()
                    ->label('Tituliniame'),

                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Nuotrauka'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
