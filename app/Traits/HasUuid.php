<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid
{

    protected  static function boot() {

        parent::boot();

        static::creating(function($model){
            if (empty($model->{$model->getKeyName()})) {

                $model->{$model->getKeyName()} = Str::uuid();
            }
        });

    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

}
