<div class="flex min-h-screen bg-white font-sans antialiased text-gray-900">
    
    {{-- Left Side: Branding / Image --}}
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-[#6366f1]">
        <!-- Modern mesh gradient background -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#4f46e5] via-[#7c3aed] to-[#2563eb] opacity-90"></div>
        
        <!-- Decorative animated blobs -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-pink-500 rounded-full mix-blend-screen filter blur-[80px] opacity-40 animate-blob"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-purple-400 rounded-full mix-blend-screen filter blur-[80px] opacity-40 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-96 h-96 bg-blue-400 rounded-full mix-blend-screen filter blur-[80px] opacity-40 animate-blob animation-delay-4000"></div>

        <div class="relative z-10 flex flex-col items-center justify-center w-full h-full text-white p-16 text-center">
            <div class="mb-10 p-6 bg-white/10 backdrop-blur-md rounded-3xl border border-white/20 shadow-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                </svg>
            </div>
            <h1 class="text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 leading-tight">Portfolio<br/>Firdhan Vandaru</h1>
            <p class="text-lg lg:text-xl text-indigo-100 max-w-md font-medium leading-relaxed">Kelola proyek, tampilkan karya terbaik Anda, dan raih lebih banyak klien profesional.</p>
        </div>
    </div>

    {{-- Right Side: Login Form --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 xl:p-24 bg-white relative">
        <div class="w-full max-w-md space-y-10 relative z-10">
            <div class="text-center lg:text-left">
                <div class="lg:hidden flex justify-center mb-8">
                    <div class="p-4 bg-indigo-50 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 tracking-tight">Selamat Datang! 👋</h2>
                <p class="mt-3 text-base text-gray-500 font-medium">Silakan masuk ke akun Anda untuk melanjutkan.</p>
            </div>

            <form wire:submit="authenticate" class="mt-8 space-y-6">
                {{ $this->form }}

                <button type="submit" class="w-full flex justify-center items-center gap-2 py-4 px-4 border border-transparent rounded-2xl shadow-xl shadow-indigo-600/20 text-sm font-bold text-white bg-[#6366f1] hover:bg-[#4f46e5] focus:outline-none focus:ring-4 focus:ring-indigo-500/30 transition-all active:scale-[0.98] mt-8 group">
                    <span>MASUK SEKARANG</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </button>
            </form>
            
            <div class="mt-10 text-center">
                <p class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Sistem Portofolio Terproteksi</p>
            </div>
        </div>
    </div>

    <style>
        /* Smooth Blob Animations */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 8s infinite cubic-bezier(0.4, 0, 0.2, 1);
        }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
        
        /* Clean up Filament form overrides to make it match the design perfectly */
        .fi-form { gap: 1.5rem !important; }
        
        /* Style inputs beautifully */
        .fi-input-wrp {
            border-radius: 1rem !important;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
            border: 1px solid #e5e7eb !important;
            background-color: #f9fafb !important;
            transition: all 0.2s ease !important;
        }
        .fi-input-wrp:focus-within {
            background-color: #ffffff !important;
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1) !important;
        }
        .fi-input {
            padding: 0.875rem 1rem !important;
            color: #111827 !important;
            background: transparent !important;
        }
        
        /* Label styling */
        .fi-fo-field-wrp-label span {
            color: #4b5563 !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
        }
        
        /* Hide filament default submit button since we have our custom one */
        .fi-btn-primary { display: none !important; } 
    </style>
</div>
