<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Date de creation', 'created_at')
                ->sortable(),
            Column::make('Nom complet', 'first_name')
                ->sortable(),
            Column::make('E-mail', 'email')
                ->sortable(),
            Column::make('profil', 'user_type_id')
            ->format(fn($value, User $user, Column $column) => $user->userType?->name)
                ->sortable(),
            Column::make('Actions', 'id')->format(function ($value, User $row, Column $column) {
                return  view('livewire.users.table-actions', ['user' => $row]);
            }),
        ];
    }

    public function builder() : Builder
    {
      return User::onlyUsers()->with('userType')->latest();
    }
}
