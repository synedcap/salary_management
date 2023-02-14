<?php

namespace App\Models;

use App\Models\Loan;
use App\Models\country;
use App\Traits\HasUuid;
use App\Models\Treatment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory,HasUuid;

    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(country::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }
}
