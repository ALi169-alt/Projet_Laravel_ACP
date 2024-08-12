<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class student extends Model
{
    use HasFactory;
 
    protected $table = 'students';

    
    public function isAdmin(){

        $user = auth()->user();
        
        // Vérifier si l'utilisateur est défini et s'il a un rôle d'administrateur
        if ($user && $user->role === 'Super Admin') {
            return true;
    
        }
      
        return false;
    }

     
public function isCreateAndUpdateAdmin(){

    $user = auth()->user();
    
    // Vérifier si l'utilisateur est défini et s'il a un rôle d'administrateur
    if ($user && $user->role === 'create and update') {
        return true;
    }
    
    return false;
}




public function isCreateOnlyAdmin(){

    $user = auth()->user();
    
    // Vérifier si l'utilisateur est défini et s'il a un rôle d'administrateur
    if ($user && $user->role === 'create-only') {
        return true;
    }
    
    return false;
}



public function isUpdateOnlyAdmin(){

    $user = auth()->user();
    
    // Vérifier si l'utilisateur est défini et s'il a un rôle d'administrateur
    if ($user && $user->role === 'update-only') {
        return true;
    }
    
    return false;
}


public function isUpdateAndDeleteAdmin(){

    $user = auth()->user();
    
    // Vérifier si l'utilisateur est défini et s'il a un rôle d'administrateur
    if ($user && $user->role === 'update and delete') {
        return true;
    }
    
    return false;
}

protected static function boot()
{
    parent::boot();

    static::creating(function ($student) {
        $student->Password = Hash::make($student->Password);
    });

    static::updating(function ($student) {
        if (!empty($student->Password)) {
            $student->Password = Hash::make($student->Password);
        }
    });
}


}
