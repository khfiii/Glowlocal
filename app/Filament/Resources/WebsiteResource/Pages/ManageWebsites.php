<?php

namespace App\Filament\Resources\WebsiteResource\Pages;

use App\Filament\Resources\WebsiteResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWebsites extends ManageRecords {
    protected static string $resource = WebsiteResource::class;

    protected function getHeaderActions(): array {
        return [
            Actions\CreateAction::make()
            ->modalWidth( 'md' )
            ->createAnother( false ),
        ];
    }
}
