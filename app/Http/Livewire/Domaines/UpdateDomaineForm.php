<?php

namespace App\Http\Livewire\Domaines;

use App\Models\Domaine;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Filament\Forms\Components\Card;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;

class UpdateDomaineForm extends Component implements HasForms
{
  use InteractsWithForms;

  public $domaine, $name;

  public function mount(Domaine $domaine)
  {
    $this->domaine = $domaine;
    $this->form->fill([
      'name' => $domaine->name,
    ]);
  }

  protected function getFormSchema(): array
  {
    return [
      Card::make()
        ->schema([
          TextInput::make('name')
            ->label('Libellé')
            ->required(),
        ])
        ->columns(1),
    ];
  }

  public function save()
  {
    $this->validate([
      'name' => ['required', 'string', Rule::unique('domaines', 'name')->ignore($this->domaine->name)],
    ]);

    $this->domaine->update(['name' => $this->name]);

    session()->flash('success', 'Domaine modifié avec succès');
    return redirect()->route('domaines.index');
  }

  public function render()
  {
    return view('livewire.domaines.update-domaine-form');
  }
}
