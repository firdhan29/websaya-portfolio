<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                Textarea::make('summary')
                    ->columnSpanFull(),
                TextInput::make('phone_wa')
                    ->label('WhatsApp Number')
                    ->numeric()
                    ->tel(),
                TextInput::make('linkedin_url')
                    ->url()
                    ->regex('/^https:\/\/(www\.)?linkedin\.com\/in\/.*$/')
                    ->helperText('Contoh: https://www.linkedin.com/in/firdhanvandaru'),
                TextInput::make('github_url')
                    ->url()
                    ->regex('/^https:\/\/(www\.)?github\.com\/.*$/')
                    ->helperText('Contoh: https://github.com/firdhan29'),
                \Filament\Forms\Components\Select::make('location')
                    ->label('Provinsi & Kota/Kabupaten')
                    ->searchable()
                    ->options(function () {
                        $path = storage_path('app/indonesia_locations.json');
                        if (file_exists($path)) {
                            return json_decode(file_get_contents($path), true);
                        }
                        return [];
                    }),
            ]);
    }
}
