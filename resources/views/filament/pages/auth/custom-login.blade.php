<div class="flex items-center justify-center min-h-screen relative overflow-hidden bg-white selection:bg-brand/30 selection:text-brand">
    {{-- Background Animations --}}
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-purple-500/10 rounded-full blur-[100px] animate-pulse"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-500/10 rounded-full blur-[100px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative z-10 w-full max-w-md px-6 py-12 mx-auto">
        <div 
            class="bg-white/80 backdrop-blur-xl border border-gray-100 shadow-2xl rounded-[2rem] p-8 sm:p-10 transform transition-all hover:scale-[1.01]"
            x-data="{ mounted: false }"
            x-init="setTimeout(() => mounted = true, 100)"
            :class="mounted ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            style="transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);"
        >
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight mb-2">Selamat Datang!</h2>
                <p class="text-sm text-gray-500 font-medium">Masuk untuk memulai atau mengelola portofolio.</p>
            </div>

            <form wire:submit="authenticate">
                {{ $this->form }}

                <button 
                    type="submit" 
                    class="w-full flex items-center justify-center gap-2 mt-6 bg-[#6366f1] hover:bg-[#4f46e5] text-white font-semibold py-3.5 px-4 rounded-xl transition-all active:scale-95 shadow-lg shadow-indigo-500/30 group"
                >
                    <span>MASUK SEKARANG</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:animate-bounce" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                </button>
            </form>

            <div class="mt-10 text-center">
                <p class="text-xs text-gray-400 font-medium">Sistem portofolio terproteksi. Hubungi Admin jika ada masalah.</p>
            </div>
        </div>
    </div>

    <style>
        /* Override default Filament Form Styles to match the sleek white look */
        .fi-form {
            gap: 1.5rem !important;
        }
        .fi-fo-field-wrp-label {
            display: flex;
        }
        .fi-fo-field-wrp-label span {
            color: #6b7280 !important; /* gray-500 */
            font-size: 0.75rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
        }
        .fi-input-wrp {
            box-shadow: none !important;
            border-radius: 0.75rem !important;
            background-color: #f9fafb !important;
            border: 1px solid #f3f4f6 !important;
            transition: all 0.2s ease !important;
        }
        .fi-input-wrp:focus-within {
            background-color: #ffffff !important;
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1) !important;
        }
        .fi-input {
            padding: 0.75rem 1rem !important;
            color: #111827 !important;
        }
        .fi-checkbox-input {
            border-radius: 50% !important;
            border-color: #d1d5db !important;
            color: #6366f1 !important;
        }
        .fi-checkbox-input:checked {
            background-color: #6366f1 !important;
            border-color: #6366f1 !important;
        }
        /* Hide the default Filament login button since we use our own */
        .fi-btn-primary {
            display: none !important;
        }
    </style>
</div>
