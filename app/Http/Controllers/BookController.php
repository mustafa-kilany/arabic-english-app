<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
public function index(Request $request)
{
    $user = Auth::user();
    $query = Book::query();

    // Role-based filtering
    if ($user->isAuthor()) {
        $query->where('user_id', $user->id);
    }

    // Apply search if a search term is provided
    if ($search = $request->input('search')) {
        $query->where(function ($q) use ($search) {
            $q->where('title_english', 'like', "%{$search}%")
              ->orWhere('title_arabic', 'like', "%{$search}%")
              ->orWhere('author_english', 'like', "%{$search}%")
              ->orWhere('author_arabic', 'like', "%{$search}%")
              ->orWhere('genre', 'like', "%{$search}%");
        });
    }

    $books = $query->get();

    return view('books.index', compact('books'));
}

    public function create()
    {
        $user = Auth::user();
        if (!$user->isAdmin() && !$user->isAuthor()) {
            abort(403, 'Unauthorized action.');
        }
        return view('books.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && !$user->isAuthor()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title_english' => 'required|string',
            'title_arabic' => 'required|string',
            'author_english' => 'required|string',
            'author_arabic' => 'required|string',
            // Add other validations if needed
        ]);

        Book::create(array_merge($request->all(), ['user_id' => $user->id]));

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && !($user->isAuthor() && $book->user_id === $user->id)) {
            abort(403, 'Unauthorized action.');
        }

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && !($user->isAuthor() && $book->user_id === $user->id)) {
            abort(403, 'Unauthorized action.');
        }

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated!');
    }

    public function destroy(Book $book)
    {
        $user = Auth::user();

        if ($user->isAdmin() || ($user->isAuthor() && $book->user_id === $user->id)) {
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Book deleted!');
        }

        abort(403, 'You do not have permission to delete this book.');
    }
}
