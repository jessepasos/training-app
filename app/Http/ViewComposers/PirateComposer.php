<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class PirateComposer
{
    private $messages = [
        1 => 'Yarrrr! there be ony two ranks of leader amongst us pirates! Captain and if your really notorious then it’s Cap’n!',
        2 => 'Now grab a mop and swab the poop deck, before I have you keelhauled',
        3 => 'There comes a time in most men’s lives where they feel the need to raise the Black Flag.',
        4 => 'You can always trust the untrustworthy because you can always trust that they will be untrustworthy. Its the trustworthy you can’t trust.',
        5 => 'Take what you can, give nothing back.',
        6 => 'Ye’ll meet the rope’s end for that ye parrot loving scabby sea bass',
        7 => 'Walk the plank ye one-eyed bow-legged rapscallion',
    ];

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('captains_message', $this->messages[rand(1, count($this->messages))]);
    }
}
