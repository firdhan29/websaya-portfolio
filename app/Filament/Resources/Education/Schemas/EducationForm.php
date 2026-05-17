<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('institution')
                    ->required(),
                TextInput::make('degree')
                    ->required(),
                DatePicker::make('start_date'),
                DatePicker::make('end_date'),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
