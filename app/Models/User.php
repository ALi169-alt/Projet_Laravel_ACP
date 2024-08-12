<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Role;

class User extends Authenticatable
{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

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


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
