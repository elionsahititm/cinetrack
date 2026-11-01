<x-layout title="Browse">
    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold text-[#1C1916] font-heading mb-2">Browse Catalog</h1>
            <p class="text-[#1C1916]/70">Search and filter movies and TV shows.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <x-card title="Inception (2010)">
                <p class="mb-4">Sci-Fi • 8.8 rating</p>
                <x-button :href="route('titles.show')">View Details</x-button>
            </x-card>

            <x-card title="Interstellar (2014)">
                <p class="mb-4">Sci-Fi • 8.7 rating</p>
                <x-button :href="route('titles.show')">View Details</x-button>
            </x-card>

            <x-card title="Breaking Bad (2008)">
                <p class="mb-4">Drama • 9.5 rating</p>
                <x-button :href="route('titles.show')">View Details</x-button>
            </x-card>
        </div>
    </div>
</x-layout>
