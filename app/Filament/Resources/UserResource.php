<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers\RoleRelationManager;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Admin Managment';

    protected static ?string $navigationIcon = 'heroicon-s-users';

    protected static ?int $navigationSort = 1;

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->is_admin === 1 && Auth::user()->hasAnyRole(['super-admin', 'admin', 'moderator']);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('is_admin', 1);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    Grid::make(1)->columnSpan(1)->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('is_admin')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('roles')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->required(),
                    ]),
                    Grid::make(1)->columnSpan(1)->schema([
                        Forms\Components\FileUpload::make('avatar_url')
                            ->label('Nuotrauka')
                            ->acceptedFileTypes(['image/png, image/jpeg', 'image/jpg'])
                            ->image()
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth('90')
                            ->imageResizeTargetHeight('90')
                            ->maxSize(4096)
                            ->directory('users/admin'),

                        Forms\Components\TextInput::make('password')
                            ->label('Slaptažodis')
                            ->placeholder('Slaptažodis')
                            ->required()
                            ->password()
                            ->dehydrateStateUsing(fn($state) => Hash::make($state))
                            ->hidden(fn($livewire) => !$livewire instanceof CreateRecord)
                            ->rule(Password::default()),
                        Forms\Components\TextInput::make('password_confirmation')
                            ->label('Pakartokite slaptažodį')
                            ->placeholder('Pakartokite slaptažodį')
                            ->required()
                            ->password()
                            ->rule('required', fn($get) => !!$get('password'))
                            ->hidden(fn($livewire) => !$livewire instanceof CreateRecord)
                            ->same('password'),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_admin')
                    ->boolean(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('Nuotrauka'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('Y-M-d')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime('Y-M-d')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                TrashedFilter::make(),
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
            RoleRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit'   => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
