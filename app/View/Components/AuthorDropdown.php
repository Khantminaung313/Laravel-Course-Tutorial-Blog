<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AuthorDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.author-dropdown', [
            // 'categories' => Category::all(),
            // 'currentCategory' => Category::firstWhere('slug', request('category'))
            'authors' => User::all(),
            'currentAuthor' => User::firstWhere('username', request('author'))
        ]);
    }
}
