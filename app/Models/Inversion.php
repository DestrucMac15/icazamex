<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inversion extends ParentModel
{
    use HasFactory;
    protected $table = 'inversiones';
}
