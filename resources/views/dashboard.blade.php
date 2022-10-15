<x-app-layout>
    <x-section-header title="Tableau de bord" />
    <div class="bg-white px-6 py-4 rounded-md shadow-lg border-2">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-8">
            @if (auth()->user()->isAdmin())
                <livewire:dashboards.admin-dashboard />
            @elseif(auth()->user()->isProjectOwner())
                <livewire:dashboards.project-owner-dashboard />
            @elseif(auth()->user()->isInvestor())
                <livewire:dashboards.investor-dashboard />
            @endif
        </div>
    </div>
</x-app-layout>
