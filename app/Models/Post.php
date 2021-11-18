<?php

namespace App\Models;

use App\Models\Traits\UserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends ParentModel
{
    use HasFactory;
    use UserTrait;

    public function imagenes(){
        return $this->belongsToMany(Multimedia::class, 'posts_imagenes');
    }

    public function usuarios(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
