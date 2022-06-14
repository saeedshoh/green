<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardHeaderSmall extends Component
{
    /**
     * Dashboard head pretitle
     *
     * @var
     */
    public $pretitle;

    /**
     * Dashboard head title
     *
     * @var
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param  string  $pretitle
     * @param  string  $title
     * @return void
     */
    public function __construct($pretitle, $title)
    {
        $this->pretitle = $pretitle;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.header-sm');
    }
}
