<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class ParentModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Overriddes default getAttributes function
     * $default param indicates if should perform default function or custom
     * @param boolean $default
     * @return array
     */
    public function getAttributes($default = true) {
        if ($default) {
            return parent::getAttributes();
        }
        return Schema::getColumnListing($this->getTable());
    }
}
