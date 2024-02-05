<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GenerateUUIDTraits
{
    protected static function bootGenerateUUIDTraits()
    {
        static::creating(function ($model) {
            $uuidAttribute = $model->getUUIDAttribute();
            $uuid = Str::uuid();
            $model->$uuidAttribute = $uuid;
        });
    }

    public function getUUIDAttribute()
    {
        return property_exists($this, 'uuidAttribute') ? $this->uuidAttribute : 'uuid';
    }
}
