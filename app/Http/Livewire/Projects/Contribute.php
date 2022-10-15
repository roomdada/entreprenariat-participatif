<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\ProjectUser;
use App\Notifications\NotifyProjectOwnerMail;
use Filament\Forms\Components\Card;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;

class Contribute extends Component implements HasForms
{
  use \Filament\Forms\Concerns\InteractsWithForms;

  public $project, $amount;

  public function mount($project)
  {
    $this->project = $project;
    $this->form->fill();
  }

  protected function getFormSchema(): array
  {
    return [
      Card::make()
        ->schema([
          TextInput::make('amount')
            ->label('Montant')
            ->required(),
        ])
        ->columns(1),
    ];
  }

  public function save()
  {
    $this->validate([
      'amount' => ['required', 'numeric', function ($attribute, $value, $fail) {
        if ((int)$value > (int)$this->project->amount) {
          $fail('Le montant ne peut pas être supérieur au montant du projet');
        }
      }],
    ]);

    ProjectUser::create([
      'amount' => $this->amount,
      'project_id' => $this->project->id,
      'user_id' => auth()->user()->id,
    ]);

    $this->project->projectOwner->notify(new NotifyProjectOwnerMail($this->project));
    session()->flash('success', 'Contribution ajoutée avec succès');
    return redirect()->route('project.show', $this->project);
  }


  public function render()
  {
    return view('livewire.projects.contribute');
  }
}
