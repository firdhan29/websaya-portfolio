<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('github_url')
                    ->url(),
                TextInput::make('live_url')
                    ->url(),
                Toggle::make('is_featured')
                    ->required(),
                \Filament\Forms\Components\TagsInput::make('technologies')
                    ->suggestions([
                        'Laravel', 'React.js', 'Vue.js', 'Tailwind CSS', 'MySQL', 
                        'PostgreSQL', 'PHP', 'JavaScript', 'TypeScript', 'Node.js', 
                        'Next.js', 'Inertia.js', 'Bootstrap', 'Framer Motion', 'Alpine.js', 'Livewire'
                    ]),
            ]);
    }
}
