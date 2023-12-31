<?php

namespace App\Models;

use App\Helpers\CodeHelper;
use App\Helpers\UuidHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
