<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class Filter extends Component
{
    public $model;

    public $categories;

    public $search;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $categories = null, $search = null)
    {
        $this->model = $model;

        $this->search = $search;

        $this->categories = $categories ? Category::has('questions')->get() : null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filter');
    }
}
