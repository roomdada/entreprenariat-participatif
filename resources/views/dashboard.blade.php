<x-app-layout>
    <x-section-header title="Tableau de bord" />
    <div class="bg-white px-6 py-4 rounded-md shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 lg:gap-8">
            <x-statistic label='Utilisateurs' value='100' />
            <x-statistic label='Domaines' value='100'  icon='cat' color='secondary'/>
            <x-statistic label='Projets' value='100'  icon='todo' color='primary'/>
        </div>
    </div>
</x-app-layout>
