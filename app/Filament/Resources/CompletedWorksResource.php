<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompletedWorksResource\Pages;
use App\Filament\Resources\CompletedWorksResource\RelationManagers;
use App\Models\CompletedWork;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CompletedWorksResource extends Resource
{
    protected static ?string $model = CompletedWork::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Atlikti darbai';

    protected static ?string $pluralModelLabel = 'Atlikti darbai';

    protected static ?string $navigationGroup = 'Turinys';

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->is_admin === 1 && Auth::user()->hasAnyRole(['super-admin', 'admin', 'moderator']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    Grid::make(3)->columnSpan(1)->schema([
                        Forms\Components\TextInput::make('structure_name')
                            ->label('Statinio pavadinimas')
                            ->required()
                            ->columnSpan('full'),

                        Forms\Components\TextInput::make('client')
                            ->label('Užsakovas')
                            ->required()
                            ->columnSpan('full'),

                        Forms\Components\Textarea::make('tasks_completed')
                            ->label('Atlikti darbai')
                            ->required()
                            ->rows(2)
                            ->columnSpan('full'),

                        DatePicker::make('started')
                            ->label('Pradžia')
                            ->native(false)
                            ->weekStartsOnMonday()
                            ->closeOnDateSelection()
                            ->displayFormat('Y')
                            ->required(),

                        DatePicker::make('finished')
                            ->label('Pabaiga')
                            ->native(false)
                            ->weekStartsOnMonday()
                            ->closeOnDateSelection()
                            ->displayFormat('Y'),
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
                            ->directory('completed_work')
                            ->columnSpan('full'),

                        Forms\Components\FileUpload::make('inner_main_image')
                            ->label('Vidinė pagrindinė nuotrauka')
                            ->acceptedFileTypes(['image/png, image/jpeg', 'image/jpg'])
                            ->image()
                            ->maxSize(4096)
                            ->imageCropAspectRatio('20:23')
                            ->directory('completed_work')
                            ->columnSpan('full'),

                        Forms\Components\FileUpload::make('inner_image')
                            ->label('Nuotraukų galerija')
                            ->acceptedFileTypes(['image/png, image/jpeg', 'image/jpg'])
                            ->image()
                            ->multiple()
                            ->maxSize(4096)
                            ->imageResizeTargetWidth('540')
                            ->directory('completed_work')
                            ->columnSpan('full'),
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('structure_name')
                    ->label('Statinio pavadinimas')
                    ->searchable(),

                Tables\Columns\TextColumn::make('client')
                    ->label('Užsakovas')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tasks_completed')
                    ->label('Atlikti darbai')
                    ->limit(40)
                    ->searchable(),
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
            'index' => Pages\ListCompletedWorks::route('/'),
            'create' => Pages\CreateCompletedWorks::route('/create'),
            'edit' => Pages\EditCompletedWorks::route('/{record}/edit'),
        ];
    }
}
