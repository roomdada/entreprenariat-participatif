<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class projectList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $domaines;
    public $projects;

    public function __construct(Collection $domaines, Collection $projects)
    {
        $this->domaines = $domaines;
        $this->projects = $projects;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.project-list');
    }
}
