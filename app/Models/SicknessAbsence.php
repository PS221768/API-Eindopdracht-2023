<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SicknessAbsence extends Model
{
    use HasFactory;

    

    public function student()
    {
        return $this->belongsTo(Students::class);
    }

    public function reason()
    {
        return $this->belongsTo(Reasons::class);
    }
}
