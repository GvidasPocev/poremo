<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LanguageResource\Pages;
use App\Models\Language;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class LanguageResource extends Resource
{
    protected static ?string $model = Language::class;

    protected static ?string $navigationIcon = 'heroicon-o-language';

    protected static ?string $modelLabel = 'Vertimai';

    protected static ?string $pluralModelLabel = 'Vertimai';

    protected static ?string $navigationGroup = 'Nustatymai';

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->is_admin === 1 && Auth::user()->hasAnyRole(['super-admin', 'admin', 'moderator']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('group')
                    ->label('Grupė')
                    ->required()
                    ->default('content')
                    ->readOnly()
                    ->columnSpan(2),

                Forms\Components\TextInput::make('key')
                    ->label('Raktas')
                    ->required()
                    ->columnSpan(2),

                Forms\Components\KeyValue::make('text')
                    ->label('Reikšmė')
                    ->keyLabel('Kalba')
                    ->valueLabel('Reikšmė')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('Raktas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('text')
                    ->label('Reikšmė')
                    ->limit(50)
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
            'index'  => Pages\ListLanguages::route('/'),
            'create' => Pages\CreateLanguage::route('/create'),
            'edit'   => Pages\EditLanguage::route('/{record}/edit'),
        ];
    }
}
