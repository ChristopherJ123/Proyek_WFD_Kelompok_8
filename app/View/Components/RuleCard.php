<?php

namespace App\View\Components;

use App\Models\TopicRule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Illuminate\View\Component;

class RuleCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public TopicRule $rule
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rule-card');
    }
}
