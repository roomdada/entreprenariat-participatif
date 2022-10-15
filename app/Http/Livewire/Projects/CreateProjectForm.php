<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class CreateProjectForm extends Component implements HasForms
{
  use InteractsWithForms;

  public $state = [
    'title' => '',
    'description' => '',
    'domaine_id' => '',
    'user_id' => '',
    'amount' => 0
  ];

  public function mount()
  {
    return $this->form->fill();
  }


  protected function getFormSchema(): array
  {
    return [
      Card::make()
        ->schema([
          TextInput::make('state.title')
            ->label('Titre du projet')
            ->required(),
          Select::make('state.domaine_id')
            ->label('Categorie du projet')
            ->options(\App\Models\Domaine::pluck('name', 'id')),
          FileUpload::make("state.image")
            ->label('Image du projet'),
          TextInput::make('state.amount')
            ->label('Montant neccessaire pour lancer le projet')
            ->required(),
          Textarea::make('state.description')
          ->label('Description du projet')
          ->required()->columnSpan(2
          )

        ])
        ->columns(2),
    ];
  }

  public function save()
  {
    $this->validate([
      'state.title' => ['required', 'string'],
      'state.domaine_id' => ['required', Rule::exists('domaines', 'id')], 
     // 'state.image' => ['required'],
      'state.description' => ['required']
    ]);

    Project::create([
      'identifier' => Str::random(5),
      'title' => $this->state['title'],
      'description' => $this->state['description'],
      'domaine_id' => $this->state['domaine_id'],
      'amount' => $this->state['amount'],
      'user_id' => auth()->user()->id
    ]);

    session()->flash('success', 'Votre projet a été ajouté avec succes !');
    return redirect()->route('projects.index');

    
  }

  public function render()
  {
    return view('livewire.projects.create-project-form');
  }
}
