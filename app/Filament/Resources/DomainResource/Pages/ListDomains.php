<?php

namespace App\Filament\Resources\DomainResource\Pages;

use App\Filament\Resources\DomainResource;
use App\Jobs\Expired\DownloadDomains;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\ActionSize;

class ListDomains extends ListRecords
{
    protected static string $resource = DomainResource::class;

    protected function getHeaderActions(): array
    {
        return [



        ];
    }
}
