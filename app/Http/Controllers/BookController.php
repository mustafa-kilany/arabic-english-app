<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\User; // Only if you explicitly use App\Models\User directly in BookController, otherwise not needed here.

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Book::class);
        $user = Auth::user();
        $query = Book::query();

        if ($user->isAuthor()) {
            $query->where('user_id', $user->id);
        }

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title_english', 'like', "%{$search}%")
                  ->orWhere('title_arabic', 'like', "%{$search}%")
                  ->orWhere('author_english', 'like', "%{$search}%")
                  ->orWhere('author_arabic', 'like', "%{$search}%")
                  ->orWhere('genre', 'like', "%{$search}%");
            });
        }

        $books = $query->latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $this->authorize('create', Book::class);
        return view('books.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Book::class);

        $validated = $request->validate([
            'title_english' => 'required|string|max:255',
            'title_arabic' => 'required|string|max:255',
            'author_english' => 'required|string|max:255',
            'author_arabic' => 'required|string|max:255',
            'description_english' => 'nullable|string',
            'description_arabic' => 'nullable|string',
            'genre' => 'required|string|max:255',
            'language' => 'required|string|in:english,arabic,both',
            'pages' => 'required|integer|min:1',
            'publication_year' => 'required|integer|min:1900|max:' . date('Y'),
            'isbn' => 'required|string|unique:books|max:20',
        ]);

        Book::create(array_merge($validated, [
            'user_id' => Auth::id()
        ]));

        return redirect()->route('books.index')
                         ->with('success', 'Book added successfully!');
    }

    public function show(Book $book)
    {
        $this->authorize('view', $book);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);

        $validated = $request->validate([
            'title_english' => 'required|string|max:255',
            'title_arabic' => 'required|string|max:255',
            'author_english' => 'required|string|max:255',
            'author_arabic' => 'required|string|max:255',
            'description_english' => 'nullable|string',
            'description_arabic' => 'nullable|string',
            'genre' => 'required|string|max:255',
            'language' => 'required|string|in:english,arabic,both',
            'pages' => 'required|integer|min:1',
            'publication_year' => 'required|integer|min:1900|max:' . date('Y'),
            'isbn' => 'required|string|max:20|unique:books,isbn,' . $book->id,
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
                         ->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        $book->delete();

        return redirect()->route('books.index')
                         ->with('success', 'Book deleted successfully!');
    }
}