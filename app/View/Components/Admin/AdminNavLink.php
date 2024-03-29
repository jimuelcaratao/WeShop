<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class AdminNavLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function active($active)
    {
        return $active === $this->active;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admin.admin-nav-link');
    }
}
