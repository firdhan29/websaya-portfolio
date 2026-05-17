<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Skill Name')
                    ->placeholder('e.g., Vue.js, Laravel, React')
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('logo')
                    ->label('Skill Logo')
                    ->image()
                    ->directory('skills')
                    ->required(),
            ]);
    }
}
