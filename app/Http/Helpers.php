<?php

use Illuminate\Support\Arr;

/**
 * Maps data array into Model
 * @param Model $model
 * @param Array $data
 * @return Model
 */
function mapModel($model = null, $data = null) {
    if ($model && $data) {
        $attributes = $model->getAttributes(false);
        foreach ($attributes as $key) {
            if ($key === $model->getKeyName()) {
                continue;
            }
            if (Arr::has($data, $key) && !empty(Arr::get($data, $key))) {
                Arr::set($model, $key, $data[$key]);
            }
        }
    }
    return $model;
}
