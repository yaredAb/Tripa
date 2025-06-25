<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardCard extends Component
{
    public $header;
    public $description;
    public $bg;

    /**
     * Create a new component instance.
     */
    public function __construct($header, $description, $bg)
    {
        $this->header = $header;
        $this->description = $description;
        $this->bg = $bg;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-card');
    }
}
