<?php

namespace App\Models;

use App\Models\Employe;
use App\Traits\HasUuid;
use App\Models\Echeance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use HasFactory,HasUuid;

    protected $guarded = [];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    public function echeances()
    {
        return $this->hasMany(Echeance::class);
    }

}
