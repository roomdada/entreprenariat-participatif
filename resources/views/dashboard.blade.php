<x-app-layout>
    <x-section-header title="Tableau de bord" />
    <div class="bg-white px-6 py-4 rounded-md shadow-lg border-2">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-8">
            @if (auth()->user()->isAdmin())
                <livewire:dashboards.admin-dashboard />
            @endif
        </div>
    </div>
</x-app-layout>
