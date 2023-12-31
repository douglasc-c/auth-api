<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Helpers\CodeHelper;
use App\Helpers\UuidHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Company;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'code',
        'type',
        'document',
        'social_reason',
        'company',
    ];

    /**
     * The attributes set to false
     */
    public $incrementing = false;

    /**
     * boot of mode
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = UuidHelper::generate($model);
            $model->code = CodeHelper::generate($model);
        });
    }

    /**
     * Get the user
     *
     * @return User
     */
    public function company()
    {
        return $this->hasOne(Company::class, 'company', 'code');
    }
}
