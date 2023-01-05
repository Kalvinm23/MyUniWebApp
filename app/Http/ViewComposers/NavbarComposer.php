<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Type;

class NavbarComposer
{
    public $types = array();
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->types = Type::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('storetypes', $this->types);
    }
}