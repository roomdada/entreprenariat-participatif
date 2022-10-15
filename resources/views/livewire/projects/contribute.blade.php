<div class='mt-10'>
  {{ $this->form }}
  <button wire:click.prevent='save' wire:loading.class="bg-blue-200" wire:loading.attr="disabled"
      class="btn btn-sm bg-primary mb-6 flex float-right mt-1">
      Valider le montant
  </button>
  <div wire:loading wire:target="save">
      Traitement en cours...
  </div>
</div>
