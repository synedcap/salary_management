<?php

namespace App\Models;

use App\Models\Employe;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class country extends Model
{
    use HasFactory,HasUuid;

    protected $guarded = [];

    public function employes()
    {
        return $this->hasMany(Employe::class);
    }
}
