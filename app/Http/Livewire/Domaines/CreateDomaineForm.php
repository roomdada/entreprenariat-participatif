<?php

namespace App\Http\Livewire\Domaines;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Filament\Forms\Components\Card;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;

class CreateDomaineForm extends Component implements HasForms
{
  use InteractsWithForms;

  public $name;

  public function mount()
  {
    $this->form->fill();
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
      'name' => ['required', 'string', Rule::unique('domaines', 'name')],
    ]);

    \App\Models\Domaine::create(['name' => $this->name]);

    session()->flash('success', 'Domaine ajouté avec succès');
    return redirect()->route('domaines.index');
  }



  public function render()
  {
    return view('livewire.domaines.create-domaine-form');
  }
}
