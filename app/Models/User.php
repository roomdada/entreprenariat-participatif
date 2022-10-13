<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $guarded = [];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password_changed_at' => 'datetime',
    'is_active' => 'boolean',
    'last_login_at' => 'datetime',
  ];

  public function createdAt() : Attribute 
  {
    return new Attribute(
      get : fn ($value) => \Carbon\Carbon::parse($value)->format('d/m/Y'),
    );
  }


  public function avatar() : Attribute
  {
    return new Attribute(
      get : fn ($value) => $value ?? 'https://ui-avatars.com/api/?name=' . $this->full_name . '&background=0D8ABC&color=fff',
    );
  }



  public function isAdmin() : bool 
  {
    return $this->role_id === Role::SUPER_ADMIN ? true : false;
  }

  public function isInvestor() : bool 
  {
    return $this->user_type_id === UserType::INVESTOR ? true : false;
  }

  public function isProjectOwner() : bool 
  {
    return $this->user_type_id === UserType::PROJECT_OWNER ? true : false;
  }

  public function role(): BelongsTo
  {
    return $this->belongsTo(Role::class);
  }

  public function projects(): HasMany
  {
    return $this->hasMany(Project::class);
  }
  

  public function userType(): BelongsTo
  {
    return $this->belongsTo(UserType::class);
  }

  public function scopeOnlyUsers($query): Builder
  {
    return $query->whereHas('role', function ($query) {
      $query->where('id', '!=', Role::SUPER_ADMIN);
    });
  }
}
