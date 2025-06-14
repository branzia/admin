<?php

namespace Branzia\Admin\Filament\Resources;

use Branzia\Admin\Filament\Resources\AdminResource\Pages;
use Branzia\Admin\Filament\Resources\AdminResource\RelationManagers;
use Branzia\Admin\Models\Admin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Model;
class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?int $navigationSort = 0;
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([Card::make()
                ->schema([
                    TextInput::make('name')->label('Name')->required()->maxLength(255),
                    TextInput::make('email')->label('Email Address')->email()->unique(ignoreRecord: true)->required()->maxLength(255),
                    Forms\Components\Checkbox::make('change_password')->label('Change Password')->visible(function(?Admin $record){
                            if($record === null) {
                                return false;
                            } else {
                                return true;
                            }
                        })->columnSpan(1)->reactive(),
                        Grid::make()->schema([
                            TextInput::make('password')->password()->confirmed()->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                ->dehydrated(fn ($state) => filled($state))->required(),
                            TextInput::make('password_confirmation')->label('Confirm Password')->password()->required(),
                        ])->columns(2)->hidden(function(?Admin $record,callable $get){
                            if($record === null){
                                return false;
                            } else {
                                if($get('change_password') == true){
                                    return false;
                                } else {
                                    return true;
                                }
                            }
                        }),
                ]),
           ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('First Name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable()->label('Email Address')->formatStateUsing(fn (string $state): string => strtolower($state))->url(fn ($record) => "mailto:{$record->email}"),
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Email' => $record->email,
        ];
    }    
}
