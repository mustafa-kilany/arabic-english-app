<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Book $book): bool
    {
        return $user->isAdmin() || ($user->isAuthor() && $book->user_id === $user->id);
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isAuthor();
    }

    public function update(User $user, Book $book): bool
    {
        return $user->isAdmin() || ($user->isAuthor() && $book->user_id === $user->id);
    }

    public function delete(User $user, Book $book): bool
    {
        return $user->isAdmin() || ($user->isAuthor() && $book->user_id === $user->id);
    }
}