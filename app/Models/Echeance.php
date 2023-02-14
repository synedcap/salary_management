<?php

namespace App\Models;

use App\Models\Loan;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Echeance extends Model
{
    use HasFactory,HasUuid;

    protected $guarded = [];

    public function employe()
    {
        return $this->belongsTo(Loan::class);
    }

}
