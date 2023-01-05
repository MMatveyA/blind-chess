<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Comment extends Component
{
    public $comment;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comment, $type)
    {
        $this->comment = $comment;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("components.comment");
    }
}
