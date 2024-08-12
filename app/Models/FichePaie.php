<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichePaie extends Model
{
    use HasFactory;
    public function employe()
    {
        return $this->belongsTo(student::class, 'employe_id');
    }
}
