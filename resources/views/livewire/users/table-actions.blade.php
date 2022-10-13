
<div class="flex items-center">
  <div x-data="{ tooltip: 'Consulter' }" class='mt-4'>
      <a href="{{ route('users.show', $user) }}" class="mr-2" title="Consulter">
          <x-icon name="eye" class="w-6 text-accent-800" />
      </a>
  </div>
      <div class='mx-2  mt-4' x-data="{ tooltip: 'Editer' }">
          <a href="{{ route('users.edit', $user) }}" class="mr-2" title="Activer">
              <x-icon name="pen" class="w-6 text-accent-800" />
          </a>
      </div>
  
</div>
