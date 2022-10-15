<?php

namespace App\Http\Livewire\Dashboards;

use Livewire\Component;

class InvestorDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboards.investor-dashboard', [
          'count_my_projects' => auth()->user()->myProjects()->count(),
          'count_projects_in_progress' =>  auth()->user()->myProjects()->where('active', true)->count(),
          'count_projects' => \App\Models\Project::count()
        ]);
    }
}
