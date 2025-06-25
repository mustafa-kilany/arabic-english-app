@php
    $book = $book ?? null;
@endphp

<div class="form-group mb-3"> {{-- Added mb-3 for Bootstrap spacing --}}
    <label>Title (English)</label>
    <input type="text" name="title_english" value="{{ old('title_english', $book->title_english ?? '') }}" class="form-control @error('title_english') is-invalid @enderror">
    @error('title_english')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Title (Arabic)</label>
    <input type="text" name="title_arabic" value="{{ old('title_arabic', $book->title_arabic ?? '') }}" class="form-control @error('title_arabic') is-invalid @enderror">
    @error('title_arabic')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Author (English)</label>
    <input type="text" name="author_english" value="{{ old('author_english', $book->author_english ?? '') }}" class="form-control @error('author_english') is-invalid @enderror">
    @error('author_english')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Author (Arabic)</label>
    <input type="text" name="author_arabic" value="{{ old('author_arabic', $book->author_arabic ?? '') }}" class="form-control @error('author_arabic') is-invalid @enderror">
    @error('author_arabic')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Genre</label>
    <input type="text" name="genre" value="{{ old('genre', $book->genre ?? '') }}" class="form-control @error('genre') is-invalid @enderror">
    @error('genre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Language</label>
    <select name="language" class="form-control @error('language') is-invalid @enderror">
        <option value="english" {{ old('language', $book->language ?? '') == 'english' ? 'selected' : '' }}>English</option>
        <option value="arabic" {{ old('language', $book->language ?? '') == 'arabic' ? 'selected' : '' }}>Arabic</option>
        <option value="both" {{ old('language', $book->language ?? '') == 'both' ? 'selected' : '' }}>Both</option> {{-- Changed from 'bilingual' to 'both' to match typical validation --}}
    </select>
    @error('language')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Pages</label>
    <input type="number" name="pages" value="{{ old('pages', $book->pages ?? '') }}" class="form-control @error('pages') is-invalid @enderror">
    @error('pages')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Publication Year</label>
    <input type="number" name="publication_year" value="{{ old('publication_year', $book->publication_year ?? '') }}" class="form-control @error('publication_year') is-invalid @enderror">
    @error('publication_year')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label>ISBN</label>
    <input type="text" name="isbn" value="{{ old('isbn', $book->isbn ?? '') }}" class="form-control @error('isbn') is-invalid @enderror">
    @error('isbn')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Description (English)</label>
    <textarea name="description_english" class="form-control @error('description_english') is-invalid @enderror">{{ old('description_english', $book->description_english ?? '') }}</textarea>
    @error('description_english')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <label>Description (Arabic)</label>
    <textarea name="description_arabic" class="form-control @error('description_arabic') is-invalid @enderror">{{ old('description_arabic', $book->description_arabic ?? '') }}</textarea>
    @error('description_arabic')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>