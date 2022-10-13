<x-app-layout>
    <x-section-header title="Mon compte" />
    <div class="bg-white px-6 py-4 rounded-md shadow-lg  border-2">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-3">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white">
                        <div class="grid grid-cols-8 gap-2 md:gap-6">
                            <div class="col-span-8">
                                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <dt class="text-sm font-medium text-gray-500">Date de création</dt>
                                        <dd class="text-sm font-normal text-gray-900">{{ $project->created_at }}</dd>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <dt class="text-sm font-medium text-gray-500">Identifiant</dt>
                                        <dd class="text-sm font-normal text-gray-900">{{ $project->identifier }}</dd>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-8">
                                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <dt class="text-sm font-medium text-gray-500">Titre</dt>
                                        </dt>
                                        <dd class="text-sm font-normal text-gray-900">{{ $project->title }}</dd>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <dt class="text-sm font-medium text-gray-500">Categorie</dt>
                                        <dd class="text-sm font-normal text-gray-900">
                                            {{ $project->domaine->name }}</dd>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-8">
                                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <dt class="text-sm font-medium text-gray-500">Porteur du projet</dt>
                                        </dt>
                                        <dd class="text-sm font-normal text-gray-900">
                                            <div class="badge badge-secondary">
                                                {{ $project->projectOwner->full_name }}</div>
                                        </dd>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <dt class="text-sm font-medium text-gray-500">Statut</dt>
                                        <dd class="text-sm font-normal text-gray-900">
                                            <div class="badge badge-primary">
                                                {{ $project->active ? 'Active' : 'Non active' }}
                                            </div>
                                        </dd>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-8">
                                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <dt class="text-sm font-medium text-gray-500">Montant</dt>
                                        </dt>
                                        <dd class="text-sm font-normal text-gray-900">
                                            {{ $project->amount }} FCFA
                                        </dd>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <dt class="text-sm font-medium text-gray-500">Description du projet</dt>
                                        <dd class="text-sm font-normal text-gray-900">
                                            {!! $project->description !!}
                                        </dd>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    @if (!$project->active)
                        <button wire:click.prevent='save' wire:loading.class="bg-blue-200" wire:loading.attr="disabled"
                            class="btn btn-sm bg-primary flex float-right mt-1">
                            Valider le projet
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
