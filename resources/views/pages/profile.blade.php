<x-layout title="User Profile">
    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold text-[#1C1916] font-heading mb-2">User Profile</h1>
            <p class="text-[#1C1916]/70">Manage your member account, viewing stats, and personal settings.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-card title="Profile Details">
                <p class="mb-1 font-semibold text-[#1C1916]">Film Enthusiast</p>
                <p class="text-xs text-[#1C1916]/60 mb-4">member since 2026</p>
                <x-button :href="route('watchlist')" variant="secondary">View Watchlist</x-button>
            </x-card>

            <x-card title="Viewing Summary">
                <p class="mb-4">Quick summary of logged films and rated titles.</p>
                <x-button :href="route('dna')">View Movie DNA</x-button>
            </x-card>

            <x-card title="Account Settings">
                <p class="mb-4">Update your profile information and preferences.</p>
                <x-button :href="route('dashboard')" variant="outline">Settings Dashboard</x-button>
            </x-card>
        </div>
    </div>
</x-layout>

