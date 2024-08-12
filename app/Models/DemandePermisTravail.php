<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandePermisTravail extends Model
{
    use HasFactory;
    public function employe()
    {
        return $this->belongsTo(student::class, 'employe_id');
    }
}
