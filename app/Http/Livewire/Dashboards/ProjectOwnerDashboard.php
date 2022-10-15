<?php

namespace App\Http\Livewire\Dashboards;

use Livewire\Component;

class ProjectOwnerDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboards.project-owner-dashboard', [
          'count_projects' => \App\Models\Project::whereUserId(auth()->id())->count(),
          'count_collaborators' => 2,
          'count_reports' => 5,
        ]);
    }
}
