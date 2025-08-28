<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

// ✅ Filament: Import the necessary contract and Panel class
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

// ✅ Filament: Implement the FilamentUser contract
class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'must_change_password',
        'user_type',
        'access_expires_at',
        'province_of_choice',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'must_change_password' => 'boolean',
            'access_expires_at' => 'datetime',
        ];
    }

    /**
     * Get the user's citizenship progress records.
     */
    public function userProgresses()
    {
        return $this->hasMany(UserProgress::class);
    }

    /**
     * Get the user's driving progress records.
     */
    public function userDrivingProgresses()
    {
        return $this->hasMany(UserDrivingProgress::class);
    }

    /**
     * Check if the user is an admin (role_id = 1).
     */
    public function isAdmin(): bool
    {
        return $this->role_id === 1;
    }

    // Define many-to-many relationship for citizenship course sections access
    public function citizenshipSections()
    {
        return $this->belongsToMany(CourseSection::class, 'course_section_user', 'user_id', 'course_section_id')->withTimestamps();
    }

    // Define many-to-many relationship for driving course sections access
    public function drivingSections()
    {
        return $this->belongsToMany(DrivingSection::class, 'driving_section_user', 'user_id', 'driving_section_id')->withTimestamps();
    }

    // ✅ Filament: Add this method to allow users to access the panel
    public function canAccessPanel(Panel $panel): bool
    {
        // For testing, just return true.
        // In the future, you can add more specific logic. For example:
        // return $this->isAdmin();
        return true;
    }
}
