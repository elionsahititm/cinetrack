<x-layout title="Home">
    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold text-[#1C1916] font-heading mb-2">Discover Movies & TV Shows</h1>
            <p class="text-[#1C1916]/70">Track what you watch and discover new titles.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <x-card title="Browse Catalog">
                <p class="mb-4">Explore movies and TV shows filtered by genre and year.</p>
                <x-button :href="route('browse')">View Catalog</x-button>
            </x-card>

            <x-card title="Movie Roulette">
                <p class="mb-4">Can't decide what to watch? Let roulette pick for you.</p>
                <x-button :href="route('roulette')">Spin Roulette</x-button>
            </x-card>

            <x-card title="Movie DNA">
                <p class="mb-4">View your personal movie statistics and top genres.</p>
                <x-button :href="route('dna')">View Stats</x-button>
            </x-card>
        </div>
    </div>
</x-layout>
