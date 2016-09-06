<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class UserComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
    	if (auth()->check()) {
    		$user = auth()->user();

	        $view->with('ships', $user->ships);
	        $view->with('pirates', $user->pirates);
	        $view->with('port', $user->port);
    	}
    }
}
