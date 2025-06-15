<?php

namespace App\View\Components;

use App\Models\Post;
use App\Models\PostComment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostButtons extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Post $post,
        public ?PostComment $comment = null,
    )
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-buttons');
    }
}
