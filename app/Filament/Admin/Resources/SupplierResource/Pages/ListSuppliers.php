<?php

namespace App\Filament\Admin\Resources\SupplierResource\Pages;

use App\Filament\Admin\Resources\SupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Support\Enums\ActionSize;

class ListSuppliers extends ListRecords
{
    protected static string $resource = SupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->size(ActionSize::ExtraSmall)
                ->icon('heroicon-m-squares-plus'),
        ];
    }
}
