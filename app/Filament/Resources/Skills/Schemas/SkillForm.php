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
                \Filament\Forms\Components\Select::make('category')
                    ->label('Category')
                    ->options([
                        'Frontend' => 'Frontend',
                        'Backend' => 'Backend',
                        'Fullstack' => 'Fullstack',
                        'Database' => 'Database',
                        'Design' => 'Design',
                        'Other' => 'Other',
                    ])
                    ->required(),
            ]);
    }
}
