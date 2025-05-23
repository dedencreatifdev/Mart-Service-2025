<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KendaraanResource\Pages;
use App\Filament\Admin\Resources\KendaraanResource\RelationManagers;
use App\Models\Kendaraan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KendaraanResource extends Resource
{
    protected static ?string $model = Kendaraan::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Kendaraan')
                    ->description('The items you have selected for Kendaraan')
                    ->icon('heroicon-m-shopping-bag')
                    ->schema([
                        // ...
                        Forms\Components\TextInput::make('kdnsb'),
                        Forms\Components\TextInput::make('kdjns'),
                        Forms\Components\TextInput::make('kendaraan'),
                        Forms\Components\TextInput::make('kdtype'),
                        Forms\Components\TextInput::make('no_seri'),
                        Forms\Components\TextInput::make('warna'),
                        Forms\Components\TextInput::make('no_bpkb'),
                        Forms\Components\TextInput::make('no_faktur'),
                        Forms\Components\DatePicker::make('tg_stnk'),
                        Forms\Components\TextInput::make('atasnama'),
                        Forms\Components\Textarea::make('alamat_kendaraan')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('km_akhir')
                            ->numeric(),
                        Forms\Components\TextInput::make('km_hari')
                            ->numeric(),
                        Forms\Components\DatePicker::make('tg_jual'),
                        Forms\Components\Textarea::make('keterangan')
                            ->columnSpanFull(),
                        Forms\Components\DatePicker::make('tg_daftar'),
                        Forms\Components\TextInput::make('id_kode'),
                        Forms\Components\TextInput::make('id_comp'),
                        Forms\Components\Toggle::make('flag')
                            ->required(),
                        Forms\Components\TextInput::make('ft_nmpemilik'),
                        Forms\Components\TextInput::make('ft_jnskend'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_polisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kdnsb')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kdjns')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kendaraan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_chasis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_mesin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kdtype')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_seri')
                    ->searchable(),
                Tables\Columns\TextColumn::make('warna')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_bpkb')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_faktur')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tg_stnk')

                    ->sortable(),
                Tables\Columns\TextColumn::make('atasnama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('km_akhir')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('km_hari')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tg_jual')

                    ->sortable(),
                Tables\Columns\TextColumn::make('tg_daftar')

                    ->sortable(),
                Tables\Columns\TextColumn::make('id_kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_comp')
                    ->searchable(),
                Tables\Columns\IconColumn::make('flag')
                    ->boolean(),
                Tables\Columns\TextColumn::make('ft_nmpemilik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ft_jnskend')
                    ->searchable(),
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
            'index' => Pages\ListKendaraans::route('/'),
            'create' => Pages\CreateKendaraan::route('/create'),
            'edit' => Pages\EditKendaraan::route('/{record}/edit'),
        ];
    }
}
