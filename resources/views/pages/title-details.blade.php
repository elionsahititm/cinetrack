<x-layout title="Title Details">
    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold text-[#1C1916] font-heading mb-2">Inception (2010)</h1>
            <p class="text-[#1C1916]/70">Directed by Christopher Nolan • Sci-Fi • 8.8 rating</p>
        </div>

        <x-card title="Overview">
            <p class="mb-4">A thief who steals corporate secrets through dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.</p>
            <div class="flex gap-3">
                <x-button>Add to Watchlist</x-button>
                <x-button :href="route('browse')" variant="secondary">Back to Browse</x-button>
            </div>
        </x-card>
    </div>
</x-layout>
