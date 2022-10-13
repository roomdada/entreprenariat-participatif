<?php

namespace App\Http\Livewire\Dashboards;

use Livewire\Component;

class AdminDashboard extends Component
{
  public function render()
  {
    return view('livewire.dashboards.admin-dashboard', [
      'count_users' => \App\Models\User::onlyUsers()->count(),
      'count_projects' => \App\Models\Project::count(),
      'count_domaines' => \App\Models\Domaine::count(),
    ]);
  }
}
