<?php

namespace App\Filament\Admin\Resources\KendaraanResource\Pages;

use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rules\File;
use Filament\Support\Enums\ActionSize;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Exports\KendaraanExporter;
use App\Filament\Imports\KendaraanImporter;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Admin\Resources\KendaraanResource;
use App\Imports\KendaraanImport;
use Filament\Forms\Components\FileUpload;

class ListKendaraans extends ListRecords
{
    protected static string $resource = KendaraanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->size(ActionSize::ExtraSmall)
                ->icon('heroicon-m-squares-plus'),
            Actions\Action::make('import')
                ->label('Import Kendaraan')
                ->form([
                    FileUpload::make('file')
                        ->label('File Excel')
                        ->required()
                        // ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel','.csv'])
                        // ->maxSize(1024 * 10) // 10 MB
                        ->enableOpen()
                        ->enableDownload()
                        ->preserveFilenames()
                        ->directory('import'),
                ])
                ->action(function (array $data) {
                    // dd($data);
                    Excel::import(new KendaraanImport, storage_path('app/public/' . $data['file']));
                    // $this->notify('success', 'Data Kendaraan berhasil diimport');
                })
                ->color('primary')
                ->icon('heroicon-o-arrow-down-tray'),
        ];
    }
}
