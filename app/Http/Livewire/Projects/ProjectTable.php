<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ProjectTable extends DataTableComponent
{
  protected $model = Project::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id');
  }

  public function columns(): array
  {
    return [
      Column::make("Date", "created_at")
        ->format(fn ($value) => $value->format('d/m/Y'))
        ->sortable(),
      Column::make("Identifiant", "identifier")
        ->sortable(),
      Column::make("Titre", "title")
        ->sortable(),
      Column::make("Domaine", "domaine_id")->format(fn ($value, Project $project, Column $column) => $project->domaine->name)
        ->sortable(),
      Column::make("Porteur", "user_id")
        ->format(fn ($value, Project $project, Column $column) => $project->projectOwner->first_name)
        ->sortable(),
      Column::make("Actions", "id")->format(function ($value, Project $row, Column $column) {
        return view('livewire.projects.table-actions', ['project' => $row]);
      }),
    ];
  }

  public function builder(): Builder
  {
    return Project::query()->with('projectOwner', 'domaine')->latest();
  }
}
