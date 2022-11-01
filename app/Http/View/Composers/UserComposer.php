<?php

namespace App\Http\View\Composers;

use App\Models\User;
use Illuminate\View\View;

class UserComposer
{
    public function compose(View $view)
    {
        $view->with('users', User::orderBy('name')->get());
    }
}
