<?php
namespace App\Models\Traits;
use Illuminate\Support\Arr;

trait UserTrait{
    /**
     * Boot function from laravel.
     */
    public static function bootUserTrait ()
    {
        static::creating(function ($model) {
            $model->user_id = Arr::get(auth()->user(), 'id');
        });
    }
}
