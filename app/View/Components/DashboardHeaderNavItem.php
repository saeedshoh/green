<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardHeaderNavItem extends Component
{
    /**
     * Dashboard head nav item link
     *
     * @var
     */
    public $link;

    /**
     * Dashboard head nav item class
     *
     * @var
     */
    public $class;

    /**
     * Create a new component instance.
     *
     * @param  string  $link
     * @param  string  $class
     * @return void
     */
    public function __construct($link, $class)
    {
        $this->link = $link;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.header-nav-item');
    }
}
