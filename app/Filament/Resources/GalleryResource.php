<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use App\Models\GalleryType;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Galerija';

    protected static ?string $pluralModelLabel = 'Galerija';

    protected static ?string $navigationGroup = 'Turinys';

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->is_admin === 1 && Auth::user()->hasAnyRole(['super-admin', 'admin', 'moderator']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        Grid::make(2)->schema([
                            Grid::make(3)->columnSpan(1)->schema([
                                Forms\Components\Select::make('type_id')
                                    ->label('Tipas')
                                    ->required()
                                    ->columnSpan('full')
                                    ->options(GalleryType::get()->pluck('name', 'id')),

                                Forms\Components\TextInput::make('alt')
                                    ->label('Alternatyvus tekstas')
                                    ->required()
                                    ->columnSpan('full'),

                                Forms\Components\Textarea::make('description')
                                    ->label('Aprašymas')
                                    ->columnSpan('full'),
                            ]),
                            Grid::make(2)->columnSpan(1)->schema([
                                Forms\Components\TextInput::make('gallery_title')
                                    ->label('Galerijos pavadinimas')
                                    ->required()
                                    ->columnSpan('full')
                                    ->maxLength(255),

                                Forms\Components\FileUpload::make('galery_images')
                                    ->label('Nuotraukų galerija')
                                    ->acceptedFileTypes(['image/png, image/jpeg', 'image/jpg'])
                                    ->image()
                                    ->multiple()
                                    ->maxSize(4096)
                                    ->imageResizeTargetWidth('540')
                                    ->required()
                                    ->directory('gallery')
                                    ->columnSpan('full'),

                                Forms\Components\Toggle::make('status')
                                    ->default(1)
                                    ->required(),
                            ]),
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('gallery.name')
                    ->label('Galerijos tipas')
                    ->sortable(),
                Tables\Columns\TextColumn::make('gallery_title')
                    ->limit(30)
                    ->label('Pavadinimas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alt')
                    ->limit(30)
                    ->label('Alternativus tekstas')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Statusas')
                    ->boolean(),
            ])
            ->filters([
                //
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
            'index'  => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit'   => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
