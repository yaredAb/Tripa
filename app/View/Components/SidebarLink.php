<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarLink extends Component
{

    public $href;
    public $active;
    public $icon;
    public $bg;

    /**
     * Create a new component instance.
     */
    public function __construct($href, $active=false, $icon=null)
    {
        $this->href = $href;
        $this->active = $active;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-link');
    }
}
