<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\CustomerResource\Pages;
use App\Filament\Admin\Resources\CustomerResource\RelationManagers;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Customer')
                    ->description('The items you have selected for Customer')
                    ->icon('heroicon-m-shopping-bag')
                    ->schema([
                        // ...
                        TextInput::make('type_id')
                            //->inlineLabel()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('type_nama')
                            //->inlineLabel()
                            ->required()
                            ->maxLength(20),
                        TextInput::make('customer_group_id')
                            ->label('Grup Kode')
                            //->inlineLabel()
                            //->inlineLabel()
                            ->numeric(),
                        TextInput::make('customer_group_nama')
                            ->label('Nama Grup')
                            //->inlineLabel()
                            ->maxLength(100),
                        TextInput::make('nama')
                            //->inlineLabel()
                            ->required()
                            ->maxLength(55),
                        TextInput::make('company')
                            //->inlineLabel()
                            ->required()
                            ->maxLength(255),
                        Textarea::make('alamat')
                            //->inlineLabel()
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('kota')
                            //->inlineLabel()
                            ->required()
                            ->maxLength(55),
                        TextInput::make('negara')
                            //->inlineLabel()
                            ->maxLength(55),
                        TextInput::make('kode_pos')
                            //->inlineLabel()
                            ->maxLength(8),
                        TextInput::make('country')
                            //->inlineLabel()
                            ->maxLength(100),
                        TextInput::make('no_phone')
                            //->inlineLabel()
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        TextInput::make('email')
                            //->inlineLabel()
                            ->email()
                            ->required()
                            ->maxLength(100),
                        TextInput::make('npwp')
                            //->inlineLabel()
                            ->maxLength(100),
                        TextInput::make('payment_term')
                            //->inlineLabel()
                            ->numeric()
                            ->default(0),
                        TextInput::make('logo')
                            ->columnSpanFull()
                            ->maxLength(255)
                            ->default('logo.png'),
                        TextInput::make('award_points')
                            //->inlineLabel()
                            ->numeric()
                            ->default(0),
                        TextInput::make('deposit_amount')
                            //->inlineLabel()
                            ->numeric(),
                        TextInput::make('credit_limit')
                            //->inlineLabel()
                            ->numeric(),
                        TextInput::make('harga_group_id')
                            //->inlineLabel()
                            ->numeric(),
                        TextInput::make('harga_group_name')
                            //->inlineLabel()
                            ->maxLength(50),
                        TextInput::make('status')
                            //->inlineLabel()
                            ->required()
                            ->numeric()
                            ->default(1),
                        TextInput::make('cf1')
                            ->maxLength(100),
                        TextInput::make('cf2')
                            ->maxLength(100),
                        TextInput::make('cf3')
                            ->maxLength(100),
                        TextInput::make('cf4')
                            ->maxLength(100),
                        TextInput::make('cf5')
                            ->maxLength(100),
                        TextInput::make('cf6')
                            ->maxLength(100),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_group_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer_group_nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kota')
                    ->searchable(),
                Tables\Columns\TextColumn::make('negara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_pos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('npwp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf4')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf5')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cf6')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_term')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('award_points')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deposit_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('credit_limit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga_group_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga_group_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCustomers::route('/'),
        ];
    }
}
