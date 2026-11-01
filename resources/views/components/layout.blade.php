@props(['title' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ? $title . ' - CineTrack' : 'CineTrack - Physical Film Ledger' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'DM Sans', ui-sans-serif, system-ui, sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Bricolage Grotesque', ui-sans-serif, system-ui, sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-[#FAF7F2] text-[#1C1916] flex flex-col antialiased">
    <header class="bg-[#FAF7F2]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 gap-4">
                <div class="flex items-center gap-8 shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-md border border-[#1C1916] overflow-hidden flex flex-col shadow-sm">
                            <div class="h-1/3 bg-[#0EA5E9]"></div>
                            <div class="h-1/3 bg-[#F59E0B]"></div>
                            <div class="h-1/3 bg-[#EA580C]"></div>
                        </div>
                        <span class="text-xl font-extrabold tracking-tight text-[#A13E0C] font-heading">
                            CineTrack
                        </span>
                    </a>

                    <nav class="hidden md:flex items-center gap-6 text-sm">
                        <a href="{{ route('home') }}" class="transition-colors pb-1 {{ request()->routeIs('home') ? 'text-[#A13E0C] font-bold border-b-2 border-[#A13E0C]' : 'text-[#1C1916]/75 hover:text-[#1C1916] font-medium' }}">
                            Discover
                        </a>
                        <a href="{{ route('browse') }}" class="transition-colors pb-1 {{ request()->routeIs('browse') || request()->routeIs('titles.*') ? 'text-[#A13E0C] font-bold border-b-2 border-[#A13E0C]' : 'text-[#1C1916]/75 hover:text-[#1C1916] font-medium' }}">
                            Browse
                        </a>
                        <a href="{{ route('watchlist') }}" class="transition-colors pb-1 {{ request()->routeIs('watchlist') ? 'text-[#A13E0C] font-bold border-b-2 border-[#A13E0C]' : 'text-[#1C1916]/75 hover:text-[#1C1916] font-medium' }}">
                            Watchlist
                        </a>
                        <a href="{{ route('roulette') }}" class="transition-colors pb-1 {{ request()->routeIs('roulette') ? 'text-[#A13E0C] font-bold border-b-2 border-[#A13E0C]' : 'text-[#1C1916]/75 hover:text-[#1C1916] font-medium' }}">
                            Roulette
                        </a>
                        <a href="{{ route('dna') }}" class="transition-colors pb-1 {{ request()->routeIs('dna') ? 'text-[#A13E0C] font-bold border-b-2 border-[#A13E0C]' : 'text-[#1C1916]/75 hover:text-[#1C1916] font-medium' }}">
                            Movie DNA
                        </a>
                        <a href="{{ route('admin.catalog') }}" class="transition-colors pb-1 {{ request()->routeIs('admin.*') ? 'text-[#A13E0C] font-bold border-b-2 border-[#A13E0C]' : 'text-[#1C1916]/75 hover:text-[#1C1916] font-medium' }}">
                            Admin
                        </a>
                    </nav>
                </div>

                <div class="flex items-center gap-3">
                    <div class="relative w-48 sm:w-64">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#1C1916]/50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input
                            type="text"
                            placeholder="Search movies, actors..."
                            class="w-full pl-9 pr-3 py-1.5 rounded-lg border border-[#DCD4C6] bg-[#F2EDE4]/80 text-[#1C1916] placeholder-[#1C1916]/40 text-xs focus:outline-none focus:ring-1 focus:ring-[#EA580C]"
                        />
                    </div>

                    <a href="{{ route('profile') }}" class="w-9 h-9 rounded-full bg-[#E5DFD4] border border-[#D2C8B8] flex items-center justify-center text-[#1C1916] hover:border-[#EA580C] hover:bg-[#FAF7F2] transition-colors shrink-0" title="User Profile">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-col">
            <div class="h-[2px] w-full bg-[#0EA5E9]"></div>
            <div class="h-[2px] w-full bg-[#F59E0B]"></div>
            <div class="h-[2px] w-full bg-[#EA580C]"></div>
        </div>
    </header>

    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

    <footer class="border-t border-[#E5DFD4] bg-[#F3EDE3] py-6 text-center text-xs text-[#1C1916]/70">
        <p>&copy; {{ date('Y') }} CineTrack — Physical Film Ledger. All rights reserved.</p>
    </footer>
</body>
</html>
