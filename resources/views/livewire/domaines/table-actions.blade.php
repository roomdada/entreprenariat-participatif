<div class="flex items-center">
  <div x-data="{ tooltip: 'Consulter' }" class='mt-4'>
      <a href="{{ route('domaines.edit', $domaine) }}" class="mr-2" title="Editer">
          <x-icon name="pen" class="w-4 text-accent-800" />
      </a>
  </div>
  @if($domaine->projects->count() == 0)
  <div class='mx-2 mt-4' x-data="{ tooltip: 'Editer' }">
    <form method="POST" action='{{ route('domaines.destroy', $domaine) }}'>
      @csrf
      {!! method_field('delete') !!}
      <button type="submit" class="" title="Supprimer">
          <x-icon name="trash" class="w-4 text-danger" />
      </button>
    </form>
  </div>
  @endif
</div>
