<?php

namespace App\Filament\Imports;

use App\Models\Kendaraan;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class KendaraanImporter extends Importer
{
    protected static ?string $model = Kendaraan::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('kdnsb'),
            ImportColumn::make('kdjns'),
            ImportColumn::make('kendaraan'),
            ImportColumn::make('kdtype'),
            ImportColumn::make('no_seri'),
            ImportColumn::make('warna'),
            ImportColumn::make('no_bpkb'),
            ImportColumn::make('no_faktur'),
            ImportColumn::make('tg_stnk')
                ->rules(['date']),
            ImportColumn::make('atasnama'),
            ImportColumn::make('alamat_kendaraan'),
            ImportColumn::make('km_akhir')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('km_hari')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('tg_jual')
                ->rules(['date']),
            ImportColumn::make('keterangan'),
            ImportColumn::make('tg_daftar')
                ->rules(['date']),
            ImportColumn::make('id_kode'),
            ImportColumn::make('id_comp'),
            ImportColumn::make('flag')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
            ImportColumn::make('ft_nmpemilik'),
            ImportColumn::make('ft_jnskend'),
        ];
    }

    public function resolveRecord(): ?Kendaraan
    {
        // return Kendaraan::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Kendaraan();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your kendaraan import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
