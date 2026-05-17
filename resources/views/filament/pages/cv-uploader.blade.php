<x-filament-panels::page>
    <div class="bg-white dark:bg-gray-900 shadow-sm rounded-xl p-8 max-w-3xl">
        <div class="mb-6">
            <h2 class="text-lg font-bold text-gray-900 dark:text-white">🚀 Magic AI CV Parsing</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Let our AI read your PDF Resume and automatically populate your Profile Summary, Work Experiences, and Educations database. Just upload your PDF and click Process!
            </p>
        </div>

        <form wire:submit="processCv" class="space-y-6">
            {{ $this->form }}

            <div class="flex items-center gap-4 pt-4 border-t border-gray-200 dark:border-gray-800">
                <x-filament::button type="submit" icon="heroicon-m-sparkles" size="lg">
                    Process with AI
                </x-filament::button>

                <div wire:loading wire:target="processCv" class="text-sm text-primary-500 font-medium animate-pulse flex items-center gap-2">
                    <x-filament::loading-indicator class="h-5 w-5" />
                    AI is analyzing your CV, please wait...
                </div>
            </div>
        </form>
    </div>
</x-filament-panels::page>
