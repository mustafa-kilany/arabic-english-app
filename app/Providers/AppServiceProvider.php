<?php

namespace App\Providers;

use App\Models\Book; // Import your Book model
use App\Policies\BookPolicy; // Import your BookPolicy
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Map your models to their corresponding policies here
        Book::class => BookPolicy::class,
        // \App\Models\User::class => \App\Policies\UserPolicy::class, // Example for User model if you had a UserPolicy
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Implicitly register policies (Laravel does this by default if your policy
        // follows naming conventions: ModelNamePolicy for ModelName)
        // However, explicitly defining them in $policies is clearer and recommended.

        // You might have other gates or authorization logic here if needed,
        // but for model policies, the $policies array is the primary mechanism.
    }
}