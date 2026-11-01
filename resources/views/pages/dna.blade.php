<x-layout title="Movie DNA">
    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold text-[#1C1916] font-heading mb-2">Movie DNA</h1>
            <p class="text-[#1C1916]/70">View personal statistics calculated from your watched history.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <x-card title="Viewing Stats">
                <p class="mb-4">Titles watched, hours logged, and average rating.</p>
                <x-button :href="route('watchlist')">Go to Watchlist</x-button>
            </x-card>

            <x-card title="Favorite Genres">
                <p class="mb-4">Breakdown of the genres you watch the most.</p>
                <x-button :href="route('browse')">Explore Genres</x-button>
            </x-card>
        </div>
    </div>
</x-layout>
