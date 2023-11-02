<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use App\Models\PageType;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Papildomi puslapiai';

    protected static ?string $pluralModelLabel = 'Papildomi puslapiai';

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
                        Forms\Components\Select::make('type_id')
                            ->label('Tipas')
                            ->required()
                            ->options(PageType::get()->pluck('name', 'id')),
                        Forms\Components\TextInput::make('title')
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('content')
                            ->label('Aprašymas')
                            ->required()
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
                                'attachFiles',
                            ])
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('context_us_form')
                            ->label('Susisiekite Forma')
                            ->default(0)
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('content_centered')
                            ->label('Centruotas turinys')
                            ->default(0)
                            ->reactive()
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('has_map')
                            ->label('Žemėlapis')
                            ->default(0)
                            ->reactive()
                            ->columnSpanFull()
                            ->required(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('map_lat')
                                    ->label('Platuma')
                                    ->required()
                                    ->hidden(function (callable $get) {
                                        return !$get('has_map');
                                    }),
                                Forms\Components\TextInput::make('map_lng')
                                    ->label('Ilguma')
                                    ->required()
                                    ->hidden(function (callable $get) {
                                        return !$get('has_map');
                                    }),
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
                Tables\Columns\IconColumn::make('has_map')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index'  => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit'   => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
