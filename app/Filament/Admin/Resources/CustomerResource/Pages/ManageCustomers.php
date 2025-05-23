<?php

namespace App\Filament\Admin\Resources\CustomerResource\Pages;

use App\Filament\Admin\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

use Filament\Support\Enums\ActionSize;

class ManageCustomers extends ManageRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->size(ActionSize::ExtraSmall)
                ->icon('heroicon-m-squares-plus')
            ,
        ];
    }
}
