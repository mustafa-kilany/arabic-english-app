@extends('layouts.main')
@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Library</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #0d6efd;
        }

        .book-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }

        .book-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Discover Your Next Favorite Book</h1>
            <p class="lead mb-5">Explore our vast collection of books from various genres and authors</p>
            <div class="d-flex justify-content-center">
                <form class="row g-3 w-75">
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-lg" placeholder="Search for books...">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-search me-2"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Books -->
    <section class="container mb-5">
        <h2 class="text-center mb-5">Featured Books</h2>
        <div class="row">
            <!-- Book Cards (Book 1 to 4) -->
            <!-- You can keep or remove these based on dynamic needs -->
        </div>
        <div class="text-center mt-4">
            <a href="#" class="btn btn-primary">View All Books</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">Why Choose Our Library</h2>
            <div class="row">
                <!-- Feature Icons -->
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="container py-5">
        <h2 class="text-center mb-5">What Our Readers Say</h2>
        <div class="row">
            <!-- Testimonial Cards -->
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2 class="mb-4">Ready to Start Your Reading Journey?</h2>
            <p class="lead mb-4">Sign up for a free library card today and get instant access to thousands of books.</p>
            <a href="#" class="btn btn-light btn-lg me-3">Sign Up Now</a>
            <a href="#" class="btn btn-outline-light btn-lg">Learn More</a>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
