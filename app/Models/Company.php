<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\UuidHelper;

class Company extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'code',
        'tag',
        'social_reason',
    ];

    /**
     * boot of mode
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = UuidHelper::generate($model);
        });
    }
}
