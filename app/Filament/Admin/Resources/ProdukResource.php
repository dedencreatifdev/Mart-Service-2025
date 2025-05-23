<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProdukResource\Pages;
use App\Filament\Admin\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // protected static ?string $navigationGroup = 'Setting';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Produk')
                    ->description('The items you have selected for Produk')
                    ->icon('heroicon-m-shopping-bag')
                    ->schema([
                        // ...
                    Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('unit')
                    ->numeric(),
                Forms\Components\TextInput::make('cost')
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('alert_quantity')
                    ->numeric()
                    ->default(20.0000),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('subcategory_id')
                    ->numeric(),
                Forms\Components\TextInput::make('cf1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cf2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cf3')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cf4')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cf5')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cf6')
                    ->maxLength(255),
                Forms\Components\TextInput::make('quantity')
                    ->numeric()
                    ->default(0.0000),
                Forms\Components\TextInput::make('tax_rate')
                    ->numeric(),
                Forms\Components\Toggle::make('track_quantity'),
                Forms\Components\TextInput::make('details')
                    ->maxLength(1000),
                Forms\Components\TextInput::make('warehouse')
                    ->numeric(),
                Forms\Components\TextInput::make('barcode_symbology')
                    ->required()
                    ->maxLength(55)
                    ->default('code128'),
                Forms\Components\TextInput::make('file')
                    ->maxLength(100),
                Forms\Components\Textarea::make('product_details')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('tax_method'),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(55)
                    ->default('standard'),
                Forms\Components\TextInput::make('supplier1')
                    ->numeric(),
                Forms\Components\TextInput::make('supplier1price')
                    ->numeric(),
                Forms\Components\TextInput::make('supplier2')
                    ->numeric(),
                Forms\Components\TextInput::make('supplier2price')
                    ->numeric(),
                Forms\Components\TextInput::make('supplier3')
                    ->numeric(),
                Forms\Components\TextInput::make('supplier3price')
                    ->numeric(),
                Forms\Components\TextInput::make('supplier4')
                    ->numeric(),
                Forms\Components\TextInput::make('supplier4price')
                    ->numeric(),
                Forms\Components\TextInput::make('supplier5')
                    ->numeric(),
                Forms\Components\TextInput::make('supplier5price')
                    ->numeric(),
                Forms\Components\Toggle::make('promotion'),
                Forms\Components\TextInput::make('promo_price')
                    ->numeric(),
                Forms\Components\DatePicker::make('start_date'),
                Forms\Components\DatePicker::make('end_date'),
                Forms\Components\TextInput::make('supplier1_part_no')
                    ->maxLength(50),
                Forms\Components\TextInput::make('supplier2_part_no')
                    ->maxLength(50),
                Forms\Components\TextInput::make('supplier3_part_no')
                    ->maxLength(50),
                Forms\Components\TextInput::make('supplier4_part_no')
                    ->maxLength(50),
                Forms\Components\TextInput::make('supplier5_part_no')
                    ->maxLength(50),
                Forms\Components\TextInput::make('sale_unit')
                    ->numeric(),
                Forms\Components\TextInput::make('purchase_unit')
                    ->numeric(),
                Forms\Components\TextInput::make('brand')
                    ->numeric(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cost')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alert_quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subcategory_id')
                    ->numeric()
                    ->sortable(),
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
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tax_rate')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('track_quantity')
                    ->boolean(),
                Tables\Columns\TextColumn::make('details')
                    ->searchable(),
                Tables\Columns\TextColumn::make('warehouse')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('barcode_symbology')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file')
                    ->searchable(),
                Tables\Columns\IconColumn::make('tax_method')
                    ->boolean(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier1price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier2')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier2price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier3')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier3price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier4')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier4price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier5')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier5price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('promotion')
                    ->boolean(),
                Tables\Columns\TextColumn::make('promo_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier1_part_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier2_part_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier3_part_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier4_part_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('supplier5_part_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sale_unit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('purchase_unit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand')
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
            'index' => Pages\ManageProduks::route('/'),
        ];
    }
}
