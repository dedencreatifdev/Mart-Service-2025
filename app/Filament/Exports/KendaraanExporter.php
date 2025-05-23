<?php

namespace App\Filament\Exports;

use App\Models\Kendaraan;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class KendaraanExporter extends Exporter
{
    protected static ?string $model = Kendaraan::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('kdnsb'),
            ExportColumn::make('kdjns'),
            ExportColumn::make('kendaraan'),
            ExportColumn::make('kdtype'),
            ExportColumn::make('no_seri'),
            ExportColumn::make('warna'),
            ExportColumn::make('no_bpkb'),
            ExportColumn::make('no_faktur'),
            ExportColumn::make('tg_stnk'),
            ExportColumn::make('atasnama'),
            ExportColumn::make('alamat_kendaraan'),
            ExportColumn::make('km_akhir'),
            ExportColumn::make('km_hari'),
            ExportColumn::make('tg_jual'),
            ExportColumn::make('keterangan'),
            ExportColumn::make('tg_daftar'),
            ExportColumn::make('id_kode'),
            ExportColumn::make('id_comp'),
            ExportColumn::make('flag'),
            ExportColumn::make('ft_nmpemilik'),
            ExportColumn::make('ft_jnskend'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your kendaraan export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
