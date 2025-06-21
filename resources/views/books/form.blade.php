@php
    $book = $book ?? null;
@endphp

<div class="form-group">
    <label>Title (English)</label>
    <input type="text" name="title_english" value="{{ old('title_english', $book->title_english ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Title (Arabic)</label>
    <input type="text" name="title_arabic" value="{{ old('title_arabic', $book->title_arabic ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Author (English)</label>
    <input type="text" name="author_english" value="{{ old('author_english', $book->author_english ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Author (Arabic)</label>
    <input type="text" name="author_arabic" value="{{ old('author_arabic', $book->author_arabic ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Genre</label>
    <input type="text" name="genre" value="{{ old('genre', $book->genre ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Language</label>
    <select name="language" class="form-control">
        <option value="english" {{ old('language', $book->language ?? '') == 'english' ? 'selected' : '' }}>English</option>
        <option value="arabic" {{ old('language', $book->language ?? '') == 'arabic' ? 'selected' : '' }}>Arabic</option>
        <option value="bilingual" {{ old('language', $book->language ?? '') == 'bilingual' ? 'selected' : '' }}>Bilingual</option>
    </select>
</div>

<div class="form-group">
    <label>Pages</label>
    <input type="number" name="pages" value="{{ old('pages', $book->pages ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Publication Year</label>
    <input type="number" name="publication_year" value="{{ old('publication_year', $book->publication_year ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>ISBN</label>
    <input type="text" name="isbn" value="{{ old('isbn', $book->isbn ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Description (English)</label>
    <textarea name="description_english" class="form-control">{{ old('description_english', $book->description_english ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Description (Arabic)</label>
    <textarea name="description_arabic" class="form-control">{{ old('description_arabic', $book->description_arabic ?? '') }}</textarea>
</div>
