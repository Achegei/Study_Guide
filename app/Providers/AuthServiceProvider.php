<?php

namespace App\Providers;

use App\Models\CourseSection;
use App\Models\DrivingSection;
use App\Policies\CourseSectionPolicy;
use App\Policies\DrivingSectionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\User' => 'App\Policies\UserPolicy', // Example entry you might already have
        CourseSection::class => CourseSectionPolicy::class, // ✅ Register CourseSectionPolicy
        DrivingSection::class => DrivingSectionPolicy::class, // ✅ Register DrivingSectionPolicy
        Blog::class =>BlogPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
