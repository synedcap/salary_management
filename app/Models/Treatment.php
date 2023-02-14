<?php

namespace App\Models;

use App\Models\Employe;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatment extends Model
{
    use HasFactory,HasUuid;

    protected $guarded = [];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
