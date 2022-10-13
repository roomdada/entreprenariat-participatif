<div class="flex items-center">
    <div x-data="{ tooltip: 'Consulter' }" class='mt-4'>
        <a href="{{ route('projects.show', $project) }}" class="mr-2" title="Consulter">
            <x-icon name="eye" class="h4 w-4 text-accent-800" />
        </a>
    </div>
    <div class='mx-2 ml mt-4' x-data="{ tooltip: 'Editer' }">
        <a href="{{ route('projects.edit', $project) }}" class="mr-2" title="Supprimer">
            <x-icon name="trash" class="h4 w-4 text-accent-800" />
        </a>
    </div>
</div>
