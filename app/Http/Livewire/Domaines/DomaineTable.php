<?php

namespace App\Http\Livewire\Domaines;

use App\Models\Domaine;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class DomaineTable extends DataTableComponent
{
  protected $model = Domaine::class;

  public function configure(): void
  {
    $this->setPrimaryKey('id');
  }

  public function columns(): array
  {
    return [
      Column::make("Date de création", "created_at")
        ->format(fn ($value) => $value->format('d/m/Y'))
        ->sortable(),
      Column::make("Nom", "name")
        ->sortable(),
      Column::make("Nbr de projets associés", "id")
      ->format(fn($value, Domaine $row, $column) => $row->projects_count)
        ->sortable(),
      Column::make("Actions", "id")->format(function ($value, Domaine $row, Column $column) {
        return view('livewire.domaines.table-actions', ['domaine' => $row]);
      }),
    ];
  }

  public function builder(): Builder
  {
    // return domaine with count of projects
    return Domaine::withCount('projects')->latest();
  }
}
