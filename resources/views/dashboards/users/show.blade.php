<x-app-layout>
    <x-section-header title="Détails du compte">
    </x-section-header>
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
                                        <dd class="text-sm font-normal text-gray-900">{{ $user->created_at }}</dd>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                      <dt class="text-sm font-medium text-gray-500">Matricule</dt>
                                      <dd class="text-sm font-normal text-gray-900">{{ $user->identifier }}</dd>
                                  </div>
                                </div>
                            </div>
                            <div class="col-span-8">
                                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <dt class="text-sm font-medium text-gray-500">Nom complet</dt>
                                        </dt>
                                        <dd class="text-sm font-normal text-gray-900">{{ $user->full_name }}</dd>
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <dt class="text-sm font-medium text-gray-500">E-mail</dt>
                                        <dd class="text-sm font-normal text-gray-900">
                                            {{ $user->email }}</dd>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-8">
                              <div class="flex flex-col md:flex-row space-y-2 md:space-y-0">
                                  <div class="w-full md:w-1/2">
                                      <dt class="text-sm font-medium text-gray-500">Type de compte</dt>
                                      </dt>
                                      <dd class="text-sm font-normal text-gray-900">
                                        <div class="badge badge-primary">{{ $user->userType->name }}</div></dd>
                                  </div>
                                  <div class="w-full md:w-1/2">
                                      <dt class="text-sm font-medium text-gray-500">Statut</dt>
                                      <dd class="text-sm font-normal text-gray-900">
                                          {{ $user->active ? 'Active' : 'Non active' }}</dd>
                                  </div>
                              </div>
                          </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
