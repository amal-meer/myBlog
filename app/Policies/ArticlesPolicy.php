<?php

namespace App\Policies;

use App\User;
use App\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlesPolicy
{
    use HandlesAuthorization;
    
    public function update(User $user, Article $articles)
    {
        return $user->id == $articles->user_id;
    }

}
