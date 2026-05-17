<x-filament-panels::page>
    <div class="relative overflow-hidden bg-white dark:bg-gray-900 shadow-2xl ring-1 ring-gray-900/5 dark:ring-white/10 rounded-3xl p-8 max-w-4xl mx-auto">
        <!-- Decorative Background Gradient -->
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-primary-500/20 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-indigo-500/20 blur-[100px] rounded-full pointer-events-none"></div>

        <div class="relative z-10">
            <div class="flex items-center gap-5 mb-8">
                <div class="flex items-center justify-center w-14 h-14 shrink-0 rounded-2xl bg-gradient-to-br from-primary-500 to-indigo-600 text-white shadow-lg">
                    <x-heroicon-o-sparkles class="animate-pulse" style="width: 32px; height: 32px;" />
                </div>
                <div>
                    <h2 class="text-2xl font-black text-gray-900 dark:text-white tracking-tight">AI Resume Engine</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 max-w-xl">
                        Let Google Gemini AI magically extract your data from a PDF Resume. It will auto-fill your Profile Summary, Work Experiences, and Educations database.
                    </p>
                </div>
            </div>

            <form wire:submit="processCv" class="space-y-8">
                <div class="p-1 rounded-2xl bg-gradient-to-b from-gray-100 to-transparent dark:from-gray-800 dark:to-transparent">
                    <div class="bg-gray-50 dark:bg-gray-900/50 p-6 rounded-[14px] backdrop-blur-sm">
                        {{ $this->form }}
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 pt-4 border-t border-gray-100 dark:border-gray-800/50">
                    <x-filament::button type="submit" icon="heroicon-m-bolt" size="lg" class="w-full sm:w-auto shadow-xl hover:shadow-primary-500/30 transition-all rounded-xl font-bold px-8">
                        Process Document with AI
                    </x-filament::button>

                    <div wire:loading wire:target="processCv" class="w-full sm:w-auto">
                        <div class="flex items-center gap-3 text-sm text-primary-600 dark:text-primary-400 font-medium animate-pulse bg-primary-50 dark:bg-primary-500/10 px-5 py-3 rounded-xl border border-primary-100 dark:border-primary-500/20">
                            <x-filament::loading-indicator class="h-5 w-5" />
                            AI is analyzing your document... Please wait.
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-filament-panels::page>
