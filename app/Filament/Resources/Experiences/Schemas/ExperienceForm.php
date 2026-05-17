<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company')
                    ->required(),
                TextInput::make('position')
                    ->required(),
                DatePicker::make('start_date')
                    ->required()
                    ->native(false)
                    ->displayFormat('M Y'),
                DatePicker::make('end_date')
                    ->native(false)
                    ->displayFormat('M Y')
                    ->disabled(fn ($get) => $get('is_current'))
                    ->dehydrated(fn ($get) => !$get('is_current')),
                Textarea::make('description')
                    ->columnSpanFull(),
                Toggle::make('is_current')
                    ->live()
                    ->afterStateUpdated(function ($set, $state) {
                        if ($state) {
                            $set('end_date', null);
                        }
                    })
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('attachment')
                    ->label('Attachments (Photos/Documents)')
                    ->directory('attachments')
                    ->disk('public')
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                    ->multiple()
                    ->reorderable()
                    ->panelLayout('grid')
                    ->columnSpanFull(),
            ]);
    }
}
