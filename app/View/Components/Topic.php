<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Carbon\Carbon;

class Topic extends Component
{
    public $topic;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topic)
    {
        $this->topic = $topic;
    }

    public function readableDate()
    {
        return $this->topic->created_at ?
            Carbon::parse($this->topic->created_at)->format('H:i  M d, Y ') :
            null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.topic');
    }
}