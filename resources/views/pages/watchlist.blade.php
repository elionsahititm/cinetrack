<x-layout title="Watchlist">
    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold text-[#1C1916] font-heading mb-2">My Watchlist</h1>
            <p class="text-[#1C1916]/70">Keep track of titles you plan to watch, are watching, or have completed.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <x-card title="Planned">
                <p class="mb-4">Titles saved for later.</p>
                <x-button :href="route('browse')">Add More</x-button>
            </x-card>

            <x-card title="Currently Watching">
                <p class="mb-4">Shows or movies currently in progress.</p>
                <x-button :href="route('browse')">Update Status</x-button>
            </x-card>

            <x-card title="Watched">
                <p class="mb-4">Completed titles with ratings.</p>
                <x-button :href="route('dna')">View in DNA</x-button>
            </x-card>
        </div>
    </div>
</x-layout>
